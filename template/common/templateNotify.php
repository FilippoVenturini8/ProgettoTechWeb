<div class="row m-4">
    <h1>
        <span class="border-bottom border-danger border-2">    
            Notifiche
        </span>
    </h1>
</div>
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="list-group mt-5 ">
        <?php foreach($templateParams["messages"]  as $notify) :?>
            <a href="../../php/api/readNotification.php?codiceNotifica=<?php echo $notify["Codice"]?>" class="unReadNotify <?php if($dbh->isRead($notify["Codice"]) == 1) { echo "readNotify";}?> list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $notify["Titolo"];?></h5>
                    <small><?php echo $notify["DataNotifica"];?></small>
                </div>
                <p class="mb-1"><?php echo $notify["Testo"];?></p>
            </a>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="col-1"></div>
</div>