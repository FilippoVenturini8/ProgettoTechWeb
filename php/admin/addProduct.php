<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Add Product";

if(!isUserLoggedIn() || !$_SESSION["isadmin"]){
    $templateParams["templateName"] = "../../template/common/templateError401.php";
} else {
    $templateParams["templateName"] = "../../template/admin/templateAddProduct.php";
    $templateParams["messages"] = $dbh->getMessages($_SESSION["mail"]);
    
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
}

require '../../template/common/base.php';
?>