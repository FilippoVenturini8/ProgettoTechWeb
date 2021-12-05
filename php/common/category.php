<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Category";
$templateParams["templateName"] = "../../template/common/templateCategory.php";
$templateParams["disksInCart"] = $dbh->getDisksInCart("gigi@gmail.com");
$templateParams["cartTotal"] = $dbh->getCartTotal("gigi@gmail.com");

if(isset($_GET)){
    $templateParams["categoryName"] = $_GET["nomeCategoria"];
    $templateParams["disks"] = $dbh->getDisksFromCategory($_GET["nomeCategoria"]);
}

require '../../template/common/base.php';
?>