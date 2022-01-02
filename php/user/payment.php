<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Payment";
$templateParams["templateName"] = "../../template/user/templatePayment.php";

if(isUserLoggedIn()){
    $templateParams["disksInCart"] = $dbh->getDisksInCart($_SESSION["mail"]);
    $templateParams["cartTotal"] = $dbh->getCartTotal($_SESSION["mail"]);
    $templateParams["messages"] = $dbh->getMessages($_SESSION["mail"]);
} else {
    $templateParams["templateName"] = "../../template/common/templateError401user.php";
}

require '../../template/common/base.php';
?>