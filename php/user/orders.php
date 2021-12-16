<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Products";
$templateParams["templateName"] = "../../template/user/templateOrders.php";

if(isUserLoggedIn()){
    $templateParams["orders"] = $dbh->getOrdersByAccount($_SESSION["mail"]);
    $templateParams["ordersDetails"] = array();
    foreach($templateParams["orders"] as $order){
        $templateParams["ordersDetails"][$order["Codice"]] = $dbh->getOrderDetails($order["Codice"]);
    }
    $templateParams["disksInCart"] = $dbh->getDisksInCart($_SESSION["mail"]);
    $templateParams["cartTotal"] = $dbh->getCartTotal($_SESSION["mail"]);
    $templateParams["messages"] = $dbh->getMessages($_SESSION["mail"]);
}

require '../../template/common/base.php';
?>