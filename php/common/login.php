<!--
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Login";
$templateParams["templateName"] = "../../template/common/templateLogin.php";
$templateParams["disksInCart"] = $dbh->getDisksInCart("gigi@gmail.com");
$templateParams["cartTotal"] = $dbh->getCartTotal("gigi@gmail.com");
$templateParams["isAdmin"] = $dbh->isAdmin("gigi@gmail.com");

require '../../template/common/base.php';

-->

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
    $templateParams["titolo"] = "Blog TW - Admin";
    $templateParams["nome"] = "../../template/common/templateIndex.php";

    $templateParams["disksInCart"] = $dbh->getDisksInCart($_SESSION["mail"]);
    $templateParams["cartTotal"] = $dbh->getCartTotal($_SESSION["mail"]);
}
else{
    $templateParams["titolo"] = "Blog TW - Login";
    $templateParams["nome"] = "../../template/common/templateLogin.php";
}


require '../../template/common/base.php';
?>