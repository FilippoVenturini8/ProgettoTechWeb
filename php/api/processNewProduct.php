<?php
require_once "../common/bootstrap.php";

$titolo = htmlspecialchars($_POST["titolo"]);
$artista = htmlspecialchars($_POST["artista"]);
$prezzo = htmlspecialchars($_POST["prezzo"]);
$quantita = htmlspecialchars($_POST["quantita"]);
$dataUscita = htmlspecialchars($_POST["datauscita"]);
$copertina = $_FILES["copertina"];

$categoria = htmlspecialchars($_POST["categoria"]);

list($result, $msg) = uploadImage(UPLOAD_DIR."LP/".$categoria."/", $copertina);

if(!is_numeric($quantita)){
    $msg = "Quantità inserita errata.";
    header("location: ../admin/addProduct.php?formmsg=".$msg);
}else if($copertina == NULL){
    $msg = "Seleziona una copertina.";
    header("location: ../admin/addProduct.php?formmsg=".$msg);
}
else{
    $idDisco = $dbh->insertNewDisk($titolo, $dataUscita, $quantita, "LP/".$categoria."/".$copertina["name"], $prezzo, $artista, $categoria);

    $msg = "";
    if($idDisco != false){
        $msg="Disco aggiunto correttamente!";
    }else{
        $msg="Errore inserimento";
    }
    header("location: ../admin/productsList.php?formmsg=".$msg);
}
?>