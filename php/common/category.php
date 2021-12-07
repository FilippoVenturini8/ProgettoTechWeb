<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Category";
$templateParams["templateName"] = "../../template/common/templateCategory.php";
$templateParams["disksInCart"] = $dbh->getDisksInCart("gigi@gmail.com");
$templateParams["cartTotal"] = $dbh->getCartTotal("gigi@gmail.com");
$templateParams["isAdmin"] = $dbh->isAdmin("gigi@gmail.com");
$templateParams["popularClicked"] = NULL;

if(isset($_GET)){
    $templateParams["categoryName"] = $_GET["nomeCategoria"];
    if($_GET["nomeCategoria"] == "Popolari"){
        $templateParams["disks"] = $dbh->getPopularsDisks();
        $templateParams["popularClicked"] = $_GET["CodiceDisco"];
    }else{
        $templateParams["disks"] = $dbh->getDisksFromCategory($_GET["nomeCategoria"]);
    }
}

require '../../template/common/base.php';
?>