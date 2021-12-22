<?php
require_once '../common/bootstrap.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["email"], hash('sha256', $_POST['password']));
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore Login! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){
    $orders = $dbh->getOrdersByAccount($_SESSION["mail"]);
    foreach($orders as $order){
        $orderState = getOrderState($order["DataOrdine"],$order["DataSpedizione"],$order["DataConsegna"]);
        $lastState = getOrderStateAtLastLogin($order["DataOrdine"],$order["DataSpedizione"],$order["DataConsegna"], $dbh->getLastLogin($_SESSION["mail"]));
        if($orderState != $lastState){
            if($lastState == "Ordine Ricevuto" && $orderState == "Ordine Spedito"){
                $titolo = "Ordine Spedito";
                $testo = "L'Ordine ".$order["Codice"]." è stato spedito.";
                $link="/user/trackMyPackage.php?idOrder=".$order['Codice'];
                $dbh->insertNotification($testo,$titolo,$link,$order["DataSpedizione"], $_SESSION["mail"]);
            }
            if($lastState == "Ordine Ricevuto" && $orderState == "Consegnato"){
                $titoloSpedito = "Ordine Spedito";
                $testoSpedito = "L'Ordine ".$order["Codice"]." è stato spedito.";
                $linkSpedito="/user/trackMyPackage.php?idOrder=".$order['Codice'];
                $dbh->insertNotification($testoSpedito,$titoloSpedito,$linkSpedito,$order["DataSpedizione"], $_SESSION["mail"]);

                $titoloConsegnato = "Ordine Consegnato";
                $testoConsegnato = "L'Ordine ".$order["Codice"]." è stato consegnato.";
                $linkConsegnato="/user/trackMyPackage.php?idOrder=".$order['Codice'];
                $dbh->insertNotification($testoConsegnato,$titoloConsegnato,$linkConsegnato,$order["DataConsegna"], $_SESSION["mail"]);
            }
            if($lastState == "Ordine Spedito" && $orderState == "Consegnato"){
                $titolo = "Ordine Consegnato";
                $testo = "L'Ordine ".$order["Codice"]." è stato consegnato.";
                $link="/user/trackMyPackage.php?idOrder=".$order['Codice'];
                $dbh->insertNotification($testo,$titolo,$link,$order["DataConsegna"], $_SESSION["mail"]);
            }
        }
    }
    $dbh->updateLastLogin($_SESSION["mail"]);
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