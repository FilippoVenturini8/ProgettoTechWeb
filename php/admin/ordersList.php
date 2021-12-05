<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Orders List";
$templateParams["templateName"] = "../../template/admin/templateOrdersList.php";
$templateParams["isAdmin"] = $dbh->isAdmin("admin@gmail.com");
$templateParams["allOrders"] = $dbh->getAllOrders();

require '../../template/common/base.php';
?>