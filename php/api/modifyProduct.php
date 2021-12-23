<?php
require_once '../common/bootstrap.php';

if($_SESSION["isadmin"]){
    $dbh->modifyProduct($_POST["Codice"], $_POST["Artista"], $_POST["Titolo"], $_POST["QuantitaDisponibile"], $_POST["Prezzo"]);
} else {
    echo json_encode(array("errore"=>"admin non loggato"));
}

?>