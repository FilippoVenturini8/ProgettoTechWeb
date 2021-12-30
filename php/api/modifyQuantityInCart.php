<?php
require_once '../common/bootstrap.php';

//TODO cambia codice disco
if(isUserLoggedIn() && !$_SESSION["isadmin"]){
    $res = $dbh->getDiskInCart($_POST["codiceDisco"], $_SESSION["mail"]);
    if(count($res) != 0){
        $res = $res[0];
        if($_POST["op"] == "d" && $res["quantita"] <= 1){
            echo json_encode(array("errore"=>"impossibile decrementare quantità"));
        } else if ($_POST["op"] == "i" && $dbh->getAvailableQuantity($_POST["codiceDisco"]) <= 0){//$res["quantita"] >= $dbh->getAvailableQuantity($_POST["codiceDisco"])){
            echo json_encode(array("errore"=>"impossibile incrementare quantità"));
        } else {
            $dbh->alterQuantityInCart($_POST["codiceDisco"], $_SESSION["mail"], $_POST["op"]);
            if($_POST["op"] == "d"){
                $dbh->increaseDiskQuantity($_POST["codiceDisco"]);
            } else {
                $dbh->decreaseDiskQuantity($_POST["codiceDisco"]);
            }
            $res = $dbh->getDiskInCart($_POST["codiceDisco"], $_SESSION["mail"]);
            $res = $res[0];
            echo json_encode(array("quantita"=>$res["quantita"], 
                                "subtotale"=>round($res["totale"], 2), 
                                "totale"=>round($dbh->getCartTotal($_SESSION["mail"])[0]["Totale"], 2)));
        }
    }
}
?>