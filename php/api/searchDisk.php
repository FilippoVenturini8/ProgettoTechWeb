<?php
    require_once '../common/bootstrap.php';

    if(isUserLoggedIn() && $_SESSION["isadmin"]){
        $res = $dbh->getDiskFromId($_POST["Codice"]);
        echo json_encode($res);
    }
?>