<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Category";
$templateParams["templateName"] = "../../template/common/templateCategory.php";

if(isset($_GET)){
    $templateParams["categoryName"] = $_GET["nomeCategoria"];
    $templateParams["disks"] = $dbh->getDisksFromCategory($_GET["nomeCategoria"]);
}

require '../../template/common/base.php';
?>