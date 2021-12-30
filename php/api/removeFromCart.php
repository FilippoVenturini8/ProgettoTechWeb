<?php
require_once '../common/bootstrap.php';

if(isUserLoggedIn() && !$_SESSION["isadmin"]){
    if($dbh->removeDiskFromCart(intval($_POST["codiceDisco"]), $_SESSION["mail"]) == 0){
        echo json_encode(array("errore"=>"impossibile decrementare quantità"));
    } else {
        $dbh->increaseDiskQuantity($_POST["codiceDisco"]);
        echo json_encode(array("totale"=>round($dbh->getCartTotal($_SESSION["mail"])[0]["Totale"], 2)));
    }
}

?>