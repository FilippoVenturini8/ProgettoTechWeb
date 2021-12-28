<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Orders List";

if(!isUserLoggedIn() || !$_SESSION["isadmin"]){
    $templateParams["templateName"] = "../../template/common/templateError401.php";
} else {
    $templateParams["templateName"] = "../../template/admin/templateOrdersList.php";
    $templateParams["messages"] = $dbh->getMessages($_SESSION["mail"]);
    
    $templateParams["allOrders"] = $dbh->getAllOrders();
    if(isset($_GET["idOrderSelected"])){
        $templateParams["idOrderSelected"] = $_GET["idOrderSelected"];
    }
}

require '../../template/common/base.php';
?>