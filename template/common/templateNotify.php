<div class="row m-4">
    <h1>
        <span class="border-bottom border-danger border-2">    
            Notifiche
        </span>
    </h1>
</div>
<div class="row">
    <div class="col-1 col-md-3"></div>
    <div class="col-10 col-md-6">
        <div class="list-group mt-5 ">
        <?php foreach($templateParams["allNotifications"]  as $notify) :?>
            <a href="../../php/api/readNotification.php?codiceNotifica=<?php echo $notify["Codice"]?>" class="unReadNotify <?php if($dbh->isRead($notify["Codice"]) == 1) { echo "readNotify";}?> list-group-item list-group-item-action" aria-current="true">
                <div class="row">
                    <div class="col-11 pt-1">
                        <h5 class="mb-1"><?php echo $notify["Titolo"];?></h5>
                    </div>
                    <?php if($dbh->isRead($notify["Codice"]) == 0):?>
                        <div class ="col-1 text-end">
                            <img src="../../img/icon/exclamation-mark.png" alt="" style="width:20px; height:20px;"/>
                        </div>
                    <?php endif;?>
                </div>
                <div class="row mb-3">
                    <small><?php echo $notify["DataNotifica"];?></small>     
                </div>
                <div class="row">
                    <p class="mb-1"><?php echo $notify["Testo"];?></p>
                </div>
            </a>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="col-1"></div>
</div>