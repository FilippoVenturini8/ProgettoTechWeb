<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Home";
$templateParams["templateName"] = "../../template/common/templateIndex.php";
$templateParams["categories"] = $dbh->getAllCategories();
$templateParams["disksInCart"] = $dbh->getDisksInCart(1);

require '../../template/common/base.php';
?>