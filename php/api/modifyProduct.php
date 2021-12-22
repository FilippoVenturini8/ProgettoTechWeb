<?php
require_once '../common/bootstrap.php';

//controllare se il disco è già presente nel carrello (se si non fare nulla)
if($_SESSION["isadmin"]){
    echo $_POST["codice"];
    echo "sopra codice";
    $dbh->modifyProduct($_POST["codice"], $_POST["Artista"], $_POST["Titolo"], 23, $_POST["Prezzo"]);

} else {
    echo json_encode(array("errore"=>"admin non loggato"));
}

?>