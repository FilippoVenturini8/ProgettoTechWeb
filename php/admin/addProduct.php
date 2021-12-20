<?php
require_once '../common/bootstrap.php';

//Base Template
$templateParams["title"] = "LP Shop - Add Product";
$templateParams["templateName"] = "../../template/admin/templateAddProduct.php";

if(!isUserLoggedIn() || !$_SESSION["isadmin"]){
    //TODO decidere cosa fare se qualcuno cerca di visitare le pagine admin e non è admin.
    //Redirect a pagina "Sorry, You Are Not Allowed to Access This Page" 
}

if(isset($_GET["formmsg"])){
    $templateParams["formmsg"] = $_GET["formmsg"];
}

$templateParams["messages"] = $dbh->getMessages($_SESSION["mail"]);

require '../../template/common/base.php';
?>