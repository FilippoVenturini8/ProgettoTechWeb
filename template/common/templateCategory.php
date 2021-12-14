<h1><?php echo $templateParams["categoryName"]?></h1>
<!--singolo disco-->
<?php foreach($templateParams["disks"] as $disk) :?>
    <div class="row p-2 border-bottom border-danger <?php if(isset($templateParams["popularClicked"]) && $disk["Codice"] == $templateParams["popularClicked"]){ echo "bg-danger";}?>">
        <div class="col-4 mt-2">
            <img src="<?php echo UPLOAD_DIR.$disk["Copertina"] ;?>" alt="" class="diskInOrder"></img>
        </div>
        <div class="col-7 mt-2">
            <p class="m-0"><?php echo $disk["Artista"];?> - <?php echo $disk["Titolo"]?></p>
            <p class="m-0">
                <?php foreach($templateParams["disksVotes"] as $diskVote) :?>
                    <?php if($diskVote["CodiceDisco"] == $disk["Codice"]){
                        echo getVoteStars($diskVote["VotoMedio"]);   
                    }?>
                <?php endforeach; ?>
            </p>
            <p><?php echo $disk["Prezzo"];?>€</p>
        </div>
        <div class="col-1">
            <button class="btn btn-default mx-0">
                <img src="../../img/icon/plus2.png" class="icon-cart" alt=""/> 
            </button>
        </div>
    </div>
<?php endforeach; ?>