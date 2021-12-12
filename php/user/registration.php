<?php
require_once '../common/bootstrap.php';

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confermapassword"]) && 
        isset($_POST["cellulare"]) && isset($_POST["cognome"]) && isset($_POST["nome"])){
    //campi settati
    if(isMailValid($_POST["email"]) && $dbh->isMailAvailable($_POST["email"]) && isPhoneValid($_POST["cellulare"]) && $_POST["password"] == $_POST["confermapassword"]){
        //new user registration
        $dbh->registerUser($_POST["nome"], $_POST["cognome"], $_POST["email"], $_POST["password"], $_POST["cellulare"]);
        //logging in new user
        $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
        registerLoggedUser($login_result[0]);
    } else {
        $templateParams["erroreRegistrazione"] = "Errore registrazione!";
    }
}
if(isUserLoggedIn()){
    header('Location: ../../php/common/index.php');
}
else{
    $templateParams["title"] = "Blog TW - Registration";
    $templateParams["templateName"] = "../../template/user/templateRegistration.php";
}

require '../../template/common/base.php';
?>