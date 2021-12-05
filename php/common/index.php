<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Home";
$templateParams["templateName"] = "../../template/common/templateIndex.php";
$templateParams["categories"] = $dbh->getAllCategories();
$templateParams["disksInCart"] = $dbh->getDisksInCart("gigi@gmail.com");
$templateParams["cartTotal"] = $dbh->getCartTotal("gigi@gmail.com");
$templateParams["isAdmin"] = $dbh->isAdmin("gigi@gmail.com");

require '../../template/common/base.php';
?>