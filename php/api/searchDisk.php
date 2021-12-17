<?php
    require_once '../common/bootstrap.php';

    if(isUserLoggedIn() && $_SESSION["isadmin"]){
        $templateParams["allDisks"] =  $dbh->searchDisk($_POST["pattern"]);
        var_dump($templateParams["allDisks"]);
    }
?>