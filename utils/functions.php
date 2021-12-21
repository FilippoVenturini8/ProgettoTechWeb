<?php
function isUserLoggedIn(){
    return !empty($_SESSION['mail']);
}

//TODO isadmin va lasciato in session? è sicuro??
function registerLoggedUser($user){
    $_SESSION["mail"] = $user["mail"];
    $_SESSION["nome"] = $user["nome"];
    $_SESSION["cognome"] = $user["cognome"];
    $_SESSION["cellulare"] = $user["cellulare"];
    $_SESSION["immagineprofilo"] = $user["immagineprofilo"];
    $_SESSION["isadmin"] = $user["isadmin"];
}

function logout(){
    unset($_SESSION['mail']);
    unset($_SESSION['nome']);
    unset($_SESSION['cognome']);
    unset($_SESSION['cellulare']);
    unset($_SESSION['immagineprofilo']);
    unset($_SESSION['isadmin']);
}

function isMailValid($mail){
    return filter_var($mail, FILTER_VALIDATE_EMAIL);
}

function isPhoneValid($phone){
    return preg_match("/^[0-9]{10}$/", $phone);
}

function getVoteStars($vote){
    $stars = "";
    $tmpVote = $vote;
    while($tmpVote >= 1){
        $stars = $stars.'★';
        $tmpVote--;
    }
    for($i = $vote; $i < 5; $i++){
        $stars = $stars.'☆';
    }
    return $stars;
}

/*function getOrderState($orderDate, $shipmentDate, $DeliveryDate){
    if(!isset($shipmentDate)){
        return "Ordine Ricevuto";
    }
    if(!isset($DeliveryDate)){
        return "Ordine Spedito";
    }
    else{
        return "Consegnato";
    }
}*/

function getOrderState($orderDate, $shipmentDate, $DeliveryDate){
    if(date("Y-m-d") < $shipmentDate){
        return "Ordine Ricevuto";
    }
    if(date("Y-m-d") < $DeliveryDate){
        return "Ordine Spedito";
    }
    else{
        return "Consegnato";
    }
}

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}

?>
