<?php
    require_once '../common/bootstrap.php';

    if(isUserLoggedIn() && $_SESSION["isadmin"]){
        $res = $dbh->searchDisk($_POST["pattern"], false);
        echo json_encode($res);
    }
?>