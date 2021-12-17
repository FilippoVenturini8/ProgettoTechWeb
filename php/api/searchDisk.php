<?php
    require_once '../common/bootstrap.php';

    if(isUserLoggedIn() && $_SESSION["isadmin"]){
        $templateParams["allDisks"] =  $dbh->searchDisk($_POST["pattern"]);
        print require("../../template/admin/templateProductsList.php");
    }
?>