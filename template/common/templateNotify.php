<div class="row m-4">
    <h1>
        <spam class="border-bottom border-danger">    
            Notifiche
        </spam>
    </h1>
</div>
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="list-group mt-5 ">
        <?php foreach($templateParams["messages"]  as $notify) :?>
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $notify["Titolo"];?></h5>
                    <small><?php echo $notify["data"];?></small>
                </div>
                <p class="mb-1"><?php echo $notify["Testo"];?></p>
            </a>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="col-1"></div>
</div>