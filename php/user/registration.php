<?php
require_once '../common/bootstrap.php';

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confermapassword"]) && 
        isset($_POST["cellulare"]) && isset($_POST["cognome"]) && isset($_POST["nome"])){
    //campi settati
    if(isMailValid($_POST["email"]) && $dbh->isMailAvailable($_POST["email"]) && isPhoneValid($_POST["cellulare"]) && $_POST["password"] == $_POST["confermapassword"]){
        //new user registration
        $dbh->registerUser($_POST["nome"], $_POST["cognome"], $_POST["email"], hash('sha256', $_POST['password']), $_POST["cellulare"], $_POST["changeImg"]);
        //logging in new user
        $login_result = $dbh->checkLogin($_POST["email"], hash('sha256', $_POST['password']));
        registerLoggedUser($login_result[0]);

        $titolo = "Benvenuto in LP Shop!";
        $testo = "Benvenuto nella piattaforma di acquisto online di vinili. Scegli la categoria che preferisci e procedi all'acquisto dei prodotti migliori per te!";
        $link="/common/index.php";
        $dbh->insertNotification($testo,$titolo,$link,date("Y-m-d h:i:s"), $_SESSION["mail"]);
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