<?php
    require_once '../common/bootstrap.php';

    if(isUserLoggedIn() && $_SESSION["isadmin"]){
        $res = $dbh->getDiskFromId($_POST["Codice"]);
        $data = array();
        foreach($res as $row) {
            array_push($data, $row);
        }
        echo json_encode($data);
    }
?>