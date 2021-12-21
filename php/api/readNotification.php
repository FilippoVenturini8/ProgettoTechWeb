<?php
require_once "../common/bootstrap.php";

if(isset($_GET["codiceNotifica"])){
    $dbh->readNotification($_GET["codiceNotifica"]);
}

header("location: ../common/notify.php");
?>