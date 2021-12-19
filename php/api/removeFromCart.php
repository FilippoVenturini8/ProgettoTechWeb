<?php
require_once '../common/bootstrap.php';

if(isUserLoggedIn() && !$_SESSION["isadmin"]){
    if($dbh->removeDiskFromCart($_POST["codiceDisco"], $_SESSION["mail"]) == 0){
        echo json_encode(array("errore"=>"impossibile decrementare quantità"));
    }
}

?>