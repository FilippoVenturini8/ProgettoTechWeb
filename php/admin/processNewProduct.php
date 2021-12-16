<?php
require_once "../common/bootstrap.php";

$titolo = htmlspecialchars($_POST["titolo"]);
$artista = htmlspecialchars($_POST["artista"]);
$prezzo = htmlspecialchars($_POST["prezzo"]);
$quantita = htmlspecialchars($_POST["quantita"]);
$dataUscita = htmlspecialchars($_POST["datauscita"]);

$idDisco = $dbh->insertNewDisk($titolo, $dataUscita, $quantita, NULL, $prezzo, $artista, NULL);

if($idDisco != false){
    echo "Inserimento avvenuto correttamente";
}else{
    echo "Errore inserimento";
}
?>