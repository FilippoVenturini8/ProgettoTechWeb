<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Category";
$templateParams["templateName"] = "../../template/common/templateCategory.php";
$templateParams["popularClicked"] = NULL;
$templateParams["disksVotes"] = $dbh->getDisksVotes();

if(isUserLoggedIn()){
    $templateParams["disksInCart"] = $dbh->getDisksInCart($_SESSION["mail"]);
    $templateParams["cartTotal"] = $dbh->getCartTotal($_SESSION["mail"]);
    $templateParams["messages"] = $dbh->getMessages($_SESSION["mail"]);
}

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