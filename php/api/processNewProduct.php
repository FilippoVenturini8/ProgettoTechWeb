<?php
require_once "../common/bootstrap.php";

$titolo = htmlspecialchars($_POST["titolo"]);
$artista = htmlspecialchars($_POST["artista"]);
$prezzo = htmlspecialchars($_POST["prezzo"]);
$quantita = htmlspecialchars($_POST["quantita"]);
$dataUscita = htmlspecialchars($_POST["datauscita"]);
$copertina = htmlspecialchars($_POST["copertina"]);

if(!is_numeric($quantita)){
    $msg = "Quantità inserita errata.";
    header("location: ../admin/addProduct.php?formmsg=".$msg);
}else if($copertina == NULL){
    $msg = "Seleziona una copertina.";
    header("location: ../admin/addProduct.php?formmsg=".$msg);
}
else{
    $idDisco = $dbh->insertNewDisk($titolo, $dataUscita, $quantita, NULL, $prezzo, $artista, NULL);

    $msg = "";
    if($idDisco != false){
        $msg="Disco aggiunto correttamente!";
    }else{
        $msg="Errore inserimento";
    }
    header("location: ../admin/productsList.php?formmsg=".$msg);
}
?>