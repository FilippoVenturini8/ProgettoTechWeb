<?php
require_once '../common/bootstrap.php';

var_dump($_POST);
if(isUserLoggedIn() && !$_SESSION["isadmin"]){
    $dbh->insertNewDiskInCart($_POST["codiceDisco"], $_SESSION["mail"]);
}

?>