<div class="list-group">
<?php foreach($templateParams["notify"]  as $notify) :?>
    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?php echo $notify["Titolo"];?></h5>
            <small><?php echo $notify["data"];?></small>
        </div>
        <p class="mb-1"><?php echo $notify["Testo"];?></p>

    </a>
<?php endforeach; ?>
</div>