<?php
require_once "../common/bootstrap.php";

$idOrder = $dbh->insertNewOrder(date("Y-m-d"), $_SESSION["mail"]);

$disksInCart = $dbh->getDisksInCart($_SESSION["mail"]);

foreach ($disksInCart as $diskInCart){
    $dbh->insertNewDiskInOrder($diskInCart["CodiceDisco"], $idOrder, $diskInCart["Quantita"]);
}

$dbh->clearCart($_SESSION["mail"]);

$titolo = "Ordine Ricevuto";
$testo = "Il tuo ordine con codice ".$idOrder." è stato ricevuto. LP shop provvederà alla spedizione il prima possibile, controlla lo stato del tuo ordine nella pagina I Miei Ordini";
$link=" ";
$dbh->insertNotification($testo,$titolo,$link,date("Y-m-d h:i:s"), $_SESSION["mail"]);

header("location: ../user/orders.php");

?>