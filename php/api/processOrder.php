<?php
require_once "../common/bootstrap.php";

$idOrder = $dbh->insertNewOrder(date("Y-m-d"), $_SESSION["mail"]);

$disksInCart = $dbh->getDisksInCart($_SESSION["mail"]);

foreach ($disksInCart as $diskInCart){
    $dbh->insertNewDiskInOrder($diskInCart["CodiceDisco"], $idOrder, $diskInCart["Quantita"]);
}

$dbh->clearCart($_SESSION["mail"]);

header("location: ../user/orders.php");

?>