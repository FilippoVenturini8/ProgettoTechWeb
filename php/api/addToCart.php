<?php
require_once '../common/bootstrap.php';

//controllare se il disco è già presente nel carrello (se si non fare nulla)
if(isUserLoggedIn() && !$_SESSION["isadmin"]){
    //il disco era già nel carrello
    if(count($dbh->getDiskInCart($_POST["codiceDisco"], $_SESSION["mail"])) > 0){
        echo json_encode(array("errore"=>"disco già presente nel carrello"));
    }else{
        $dbh->insertNewDiskInCart($_POST["codiceDisco"], $_SESSION["mail"]);
        $disk = $dbh->getDisk($_POST["codiceDisco"]);
        echo json_encode(array("codice"=>$disk["Codice"], "titolo"=>$disk["Titolo"], "copertina"=>$disk["Copertina"], "prezzo"=>$disk["Prezzo"], "artista"=>$disk["Artista"], "totale"=>round($dbh->getCartTotal($_SESSION["mail"])[0]["Totale"], 2)));
    }
} else {
    echo json_encode(array("errore"=>"utente non loggato o admin"));
}

?>