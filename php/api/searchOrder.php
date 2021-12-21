<?php
    require_once '../common/bootstrap.php';

    if(isUserLoggedIn() && $_SESSION["isadmin"]){
        $res = $dbh->getMatchingOrders($_POST["pattern"]);
        $data = array();
        foreach($res as $row) {
            $row["Stato"] = getOrderState($row["DataOrdine"], $row["DataSpedizione"], $row["DataConsegna"]);
            $row["Dettagli"] = json_encode($dbh->getOrderDetails($row["CodiceOrdine"]));
            array_push($data, $row);
        }
        echo json_encode($data);
    }
?>