<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Orders List";
$templateParams["templateName"] = "../../template/admin/templateOrdersList.php";
$templateParams["isAdmin"] = $dbh->isAdmin("admin@gmail.com");
$templateParams["allOrders"] = $dbh->getAllOrders();

$templateParams["messages"] = $dbh->getMessages($_SESSION["mail"]);

if(isset($_GET["idOrderSelected"])){
    $templateParams["idOrderSelected"] = $_GET["idOrderSelected"];
}

require '../../template/common/base.php';
?>