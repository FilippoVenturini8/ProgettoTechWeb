<?php
require_once "../common/bootstrap.php";

$idOrder = $dbh->insertNewOrder(date("Y-m-d"), date('Y-m-d', strtotime("+1 days")), date('Y-m-d', strtotime("+3 days")), $_SESSION["mail"]);

$disksInCart = $dbh->getDisksInCart($_SESSION["mail"]);

foreach ($disksInCart as $diskInCart){
    $dbh->insertNewDiskInOrder($diskInCart["CodiceDisco"], $idOrder, $diskInCart["Quantita"]);
    $dbh->alterQuantityDisk($diskInCart["CodiceDisco"], $diskInCart["Quantita"]);
}

$finishedDisks = $dbh->getFinishedDisks();

foreach ($finishedDisks as $finishedDisk){
    $titolo = "Disco Terminato";
    $testo = "Il Disco : \"".$finishedDisk["Titolo"]. "\" di : ".$finishedDisk["Artista"]." è terminato.";
    $link=" ";
    $dbh->insertNotification($testo,$titolo,$link,date("Y-m-d h:i:s"), $dbh->selectAdminMail());
}

$dbh->clearCart($_SESSION["mail"]);

$titoloUser = "Ordine #".$idOrder." ricevuto";
$testoUser = "Il tuo ordine con codice ".$idOrder." è stato ricevuto. LP shop provvederà alla spedizione il prima possibile.<br>Clicca qui per verificare lo stato del tuo ordine.";
$linkUser="/user/trackMyPackage.php?idOrder=".$idOrder;
$dbh->insertNotification($testoUser,$titoloUser,$linkUser,date("Y-m-d h:i:s"), $_SESSION["mail"]);

$titoloAdmin = "Ordine #".$idOrder." ricevuto";
$testoAdmin = "Hai ricevuto un ordine da: ".$_SESSION["mail"]."<br>Clicca qui per visualizzare i dettagli dell'ordine.";
$linkAdmin="/admin/ordersList.php?idOrderSelected=".$idOrder."#".$idOrder;
$dbh->insertNotification($testoAdmin,$titoloAdmin,$linkAdmin,date("Y-m-d h:i:s"), $dbh->selectAdminMail());

header("location: ../user/orders.php");

?>