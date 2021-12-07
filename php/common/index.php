<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Home";
$templateParams["templateName"] = "../../template/common/templateIndex.php";
$templateParams["categories"] = $dbh->getAllCategories();
$templateParams["userMail"] = "gigi@gmail.com";
$templateParams["userInfo"] = $dbh->getUserInfo($templateParams["userMail"]);
$templateParams["disksInCart"] = $dbh->getDisksInCart($templateParams["userMail"]);
$templateParams["cartTotal"] = $dbh->getCartTotal($templateParams["userMail"]);
$templateParams["isAdmin"] = $dbh->isAdmin($templateParams["userMail"]);
$templateParams["popularsDisks"] = $dbh->getPopularsDisks();

require '../../template/common/base.php';
?>