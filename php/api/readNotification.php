<?php
require_once "../common/bootstrap.php";

if(isset($_GET["codiceNotifica"])){
    if($dbh->isRead($_GET["codiceNotifica"]) == 0){
        $dbh->readNotification($_GET["codiceNotifica"]);
    }
    $notifyLink = $dbh->getNotificationLink($_GET["codiceNotifica"]);
    header("location: ..".$notifyLink);
}
?>