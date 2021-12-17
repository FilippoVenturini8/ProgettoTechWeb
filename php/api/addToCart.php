<?php
require_once '../common/bootstrap.php';

if(isUserLoggedIn() && !$_SESSION["isadmin"]){
    $dbh->insertNewDiskInCart($_POST["codiceDisco"], $_SESSION["mail"]);
}

?>