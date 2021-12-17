<?php
require_once '../common/bootstrap.php';

//TODO cambia codice disco
if(isUserLoggedIn() && !$_SESSION["isadmin"]){
    $dbh->alterQuantityInCart($_POST["codiceDisco"], $_SESSION["mail"], $_POST["op"]);
}
?>