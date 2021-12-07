<h1><?php echo $templateParams["categoryName"]?></h1>
<!--singolo disco-->
<?php foreach($templateParams["disks"] as $disk) :?>
    <div class="row p-2 border-bottom border-danger <?php if(isset($templateParams["popularClicked"]) && $disk["Codice"] == $templateParams["popularClicked"]){ echo "bg-danger";}?>">
        <div class="col-4 mt-2">
            <img src="<?php echo UPLOAD_DIR.$disk["Copertina"] ;?>" alt="" class="diskInOrder"></img>
        </div>
        <div class="col-8 mt-2">
            <p class="m-0"><?php echo $disk["Artista"];?> - <?php echo $disk["Titolo"]?></p>
            <p class="m-0">★★★☆☆</p>
            <p><?php echo $disk["Prezzo"];?>€</p>
            <button type="button" class="btn btn-primary float-end rounded-circle">+</button>
        </div>
    </div>
<?php endforeach; ?>