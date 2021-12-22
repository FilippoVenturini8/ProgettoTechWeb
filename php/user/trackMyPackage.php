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
        $templateParams["statoOrdine"] = getOrderState($templateParams["order"][0]["DataOrdine"], 
                                                       $templateParams["order"][0]["DataSpedizione"], 
                                                       $templateParams["order"][0]["DataConsegna"]);
    }
}

require '../../template/common/base.php';
?>