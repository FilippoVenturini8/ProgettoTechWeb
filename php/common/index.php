<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Home";
$templateParams["templateName"] = "../../template/common/templateIndex.php";
$templateParams["categories"] = $dbh->getAllCategories();
$templateParams["popularsDisks"] = $dbh->getPopularsDisks();

if(isUserLoggedIn()){
    $templateParams["disksInCart"] = $dbh->getDisksInCart($_SESSION["mail"]);
    $templateParams["cartTotal"] = $dbh->getCartTotal($_SESSION["mail"]);
    $templateParams["messages"] = $dbh->getMessages($_SESSION["mail"]);
}

require '../../template/common/base.php';
?>