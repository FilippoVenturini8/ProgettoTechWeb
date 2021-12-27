<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Products";
$templateParams["templateName"] = "../../template/admin/templateProductsList.php";
/*$templateParams["isAdmin"] = $dbh->isAdmin("gigi@gmail.com");*/
$templateParams["allDisks"] = $dbh->getAllDisks(false);
$templateParams["messages"] = $dbh->getMessages($_SESSION["mail"]);

if(isset($_GET["formmsg"])){
    $templateParams["formmsg"] = $_GET["formmsg"];
}

if(isset($_GET["idFinishedDisk"])){
    $templateParams["idFinishedDisk"] = $_GET["idFinishedDisk"];
}
require '../../template/common/base.php';
?>