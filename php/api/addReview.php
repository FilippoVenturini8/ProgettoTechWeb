<?php 
require_once '../common/bootstrap.php';

if(isUserLoggedIn() && isset($_POST["codiceDisco"]) && isset($_POST["codiceOrdine"]) && isset($_POST["voto"])){
    $dbh->addReview($_POST["codiceDisco"], $_POST["voto"], $_POST["codiceOrdine"]);
}

?>