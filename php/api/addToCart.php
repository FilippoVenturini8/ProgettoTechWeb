<?php
require_once '../common/bootstrap.php';


if(isUserLoggedIn() && !$_SESSION["isadmin"])){
    $dbh->insertNewDiskInCart(substr($_POST["codiceDisco"], 7), $_SESSION["mail"]);
}

?>