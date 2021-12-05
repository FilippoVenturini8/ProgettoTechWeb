<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Add Product";
$templateParams["templateName"] = "../../template/admin/templateAddProduct.php";
$templateParams["isAdmin"] = $dbh->isAdmin("gigi@gmail.com");

require '../../template/common/base.php';
?>