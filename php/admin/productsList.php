<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Products";

if(!isUserLoggedIn() || !$_SESSION["isadmin"]){
    $templateParams["templateName"] = "../../template/common/templateError401.php";
} else {
    $templateParams["templateName"] = "../../template/admin/templateProductsList.php";
    $templateParams["messages"] = $dbh->getMessages($_SESSION["mail"]);

    $templateParams["allDisks"] = $dbh->getAllDisks(false);
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
    if(isset($_GET["idFinishedDisk"])){
        $templateParams["idFinishedDisk"] = $_GET["idFinishedDisk"];
    }
}

require '../../template/common/base.php';
?>