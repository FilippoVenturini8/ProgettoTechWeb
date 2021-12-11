<?php
require_once '../common/bootstrap.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        //$templateParams["errorelogin"] = "Errore! Controllare username o password!";
        echo "errore";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){
    header('Location: ../../php/common/index.php');
}
else{
    $templateParams["title"] = "Blog TW - Login";
    $templateParams["templateName"] = "../../template/common/templateLogin.php";
}
/*
$templateParams["disksInCart"] = $dbh->getDisksInCart($_SESSION["mail"]);
$templateParams["cartTotal"] = $dbh->getCartTotal($_SESSION["mail"]);
*/

require '../../template/common/base.php';
?>