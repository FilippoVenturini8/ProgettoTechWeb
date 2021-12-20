<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Products";
$templateParams["templateName"] = "../../template/admin/templateProductsList.php";
$templateParams["isAdmin"] = $dbh->isAdmin("gigi@gmail.com");
$templateParams["allDisks"] = $dbh->getAllDisks();

if(isset($_GET["formmsg"])){
    $templateParams["formmsg"] = $_GET["formmsg"];
}

require '../../template/common/base.php';
?>