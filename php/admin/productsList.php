<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Products";
$templateParams["templateName"] = "../../template/admin/templateProductsList.php";
$templateParams["isAdmin"] = $dbh->isAdmin("gigi@gmail.com");
$templateParams["allDisks"] = $dbh->getAllDisks();

require '../../template/common/base.php';
?>