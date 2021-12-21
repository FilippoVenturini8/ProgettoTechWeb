<?php
require_once '../common/bootstrap.php';

$dbh->removeDiskFromList(intval($_POST["codiceDisco"]));

header('Location: ../admin/productsList.php');

?>