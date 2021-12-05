<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Profile";
$templateParams["templateName"] = "../../template/common/templateProfile.php";
$templateParams["disksInCart"] = $dbh->getDisksInCart("gigi@gmail.com");
$templateParams["cartTotal"] = $dbh->getCartTotal("gigi@gmail.com");
$templateParams["isAdmin"] = $dbh->isAdmin("gigi@gmail.com");

require '../../template/common/base.php';
?>