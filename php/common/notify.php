<?php
require_once '../common/bootstrap.php';


if(!isUserLoggedIn()){
    header('Location: ../../php/common/login.php');
}

//Base Template
$templateParams["title"] = "LP Shop - Notify";
$templateParams["templateName"] = "../../template/common/templateNotify.php";
$templateParams["disksInCart"] = $dbh->getDisksInCart($_SESSION["mail"]);
$templateParams["cartTotal"] = $dbh->getCartTotal($_SESSION["mail"]);
$templateParams["allNotifications"] = $dbh->getAllNotifications($_SESSION["mail"]);

$templateParams["messages"] = $dbh->getMessages($_SESSION["mail"]);


require '../../template/common/base.php';
?>