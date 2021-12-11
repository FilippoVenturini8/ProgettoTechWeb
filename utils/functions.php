<?php
function isUserLoggedIn(){
    return !empty($_SESSION['mail']);
}

function registerLoggedUser($user){
    $_SESSION["mail"] = $user["idautore"];
    $_SESSION["nome"] = $user["nome"];
    $_SESSION["cognome"] = $user["cognome"];
    $_SESSION["cellulare"] = $user["cellulare"];
    $_SESSION["immagineprofilo"] = $user["immagineprofilo"];
    $_SESSION["isadmin"] = $user["isadmin"];
}


?>
