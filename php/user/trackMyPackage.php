<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Products";
$templateParams["templateName"] = "../../template/user/templateTrackMyPackage.php";

if(isUserLoggedIn()){
    $templateParams["disksInCart"] = $dbh->getDisksInCart($_SESSION["mail"]);
    $templateParams["cartTotal"] = $dbh->getCartTotal($_SESSION["mail"]);
    $templateParams["messages"] = $dbh->getMessages($_SESSION["mail"]);

    if(isset($_GET["idOrder"])){
        $templateParams["order"] = $dbh->getOrderDetails($_GET["idOrder"]);
        $templateParams["unvotedDisks"] = array();
        foreach($templateParams["order"] as $disk){
            if($disk["Voto"] == NULL){
                array_push($templateParams["unvotedDisks"], $disk);
            }
        }
        $templateParams["statoOrdine"] = getOrderState($templateParams["order"][0]["DataOrdine"], 
                                                       $templateParams["order"][0]["DataSpedizione"], 
                                                       $templateParams["order"][0]["DataConsegna"]);
        if($templateParams["statoOrdine"] == "Consegnato" && count($templateParams["unvotedDisks"]) > 0){
            $templateParams["openReview"] = 1;
        }
    }
} else {
    $templateParams["templateName"] = "../../template/common/templateError401user.php";
}

require '../../template/common/base.php';
?>