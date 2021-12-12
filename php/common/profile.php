<?php
require_once '../common/bootstrap.php';


if(!isUserLoggedIn()){
    header('Location: ../../php/common/login.php');
}

//Base Template
$templateParams["title"] = "LP Shop - Profile";
$templateParams["templateName"] = "../../template/common/templateProfile.php";
$templateParams["disksInCart"] = $dbh->getDisksInCart($_SESSION["mail"]);
$templateParams["cartTotal"] = $dbh->getCartTotal($_SESSION["mail"]);


require '../../template/common/base.php';
?>