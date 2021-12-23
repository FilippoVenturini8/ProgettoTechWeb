<?php
require_once '../common/bootstrap.php';

if(isset($_POST["codiceDisco"])){
    $id = $_POST["codiceDisco"];
    $disk = $dbh->getDiskFromId($id)[0]; 
    var_dump($disk);
    foreach($dbh->getUserWithDiskInCart($id) as $user){
        $dbh->insertNotification($disk["Titolo"]." - ".$disk["Artista"]." non è più disponibile. Sarai aggiornato in futuro di eventuali ritorni! Per il momento puoi continuare ad esplorare il nostro sito cliccando qui!", 
                                  "Disco non disponibile", "/common/index.php", date("Y-m-d h:i:s"), $user["mail"]);
    }
    $dbh->deleteDisk(intval($id));
    $dbh->removeDiskFromAllCart($id);
}

?>