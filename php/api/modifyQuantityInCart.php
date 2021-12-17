<?php
require_once '../common/bootstrap.php';

//TODO cambia codice disco
$dbh->alterQuantityInCart(1, $_SESSION["mail"], $_POST["op"]);
?>