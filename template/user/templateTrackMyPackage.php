<?php $order = $templateParams["order"][0]?>
<div class="row mt-4">
    <h1>
        <span class="mx-4 border-bottom border-2 border-danger">
            Traccia il mio pacco #<?php echo $order["CodiceOrdine"]?>
        </span>
    </h1>
</div>

<!--carosello-->
<div class="mx-5 mt-4">
    <div id="carousel<?php echo $order["CodiceOrdine"] ?>" class="carousel slide d-inline-block" data-interval="false" style="width: 180px;">
        <div class="carousel-inner w-100">
            <?php $i=0; foreach($dbh->getOrderDetails($order["CodiceOrdine"]) as $disk) :?>
                <div class="carousel-item <?php if($i==0){ echo "active";}?> w-100">
                    <img src="<?php echo UPLOAD_DIR.$disk["Copertina"]?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption py-0">
                        <p><?php echo $disk["Titolo"]?> - <?php echo $disk["Artista"];?></p>
                    </div>
                </div>
            <?php $i=$i+1; endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $order["CodiceOrdine"] ?>" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $order["CodiceOrdine"] ?>" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="mx-5 mt-2">
    <div class="progress" style="height: 20px; width: 180px">
        <div class="progress-bar bg-danger text-center
         <?php if($templateParams["statoOrdine"] == "Ordine Ricevuto"){
                echo " w-25";
             } else if($templateParams["statoOrdine"] == "Ordine Spedito"){
                echo " w-75";
             } else {
                echo " w-100";
             }
        ?>" role="progressbar"></div>
        <p class="position-absolute text-dark mx-5"><?php echo $templateParams["statoOrdine"]?></p>
    </div>
</div> 
<div class="mx-5 mt-5">
    <div class="mb-2">
        <img class="d-inline-block img-orderState" src="../../img/icon/tick.png" alt=""/>
        <span><?php echo "Ordinato il ".$order["DataOrdine"];?></span>
    </div>
    <?php if($templateParams["statoOrdine"] == "Ordine Ricevuto"): ?>
        <div class="mb-2">
            <img class="d-inline-block img-orderState" src="../../img/icon/clock.png" alt=""/>
            <span> Spedizione prevista il <?php echo $order["DataSpedizione"] ?> </span>
        </div>
    <?php else: ?>
        <div class="mb-2">
            <img class="d-inline-block img-orderState" src="../../img/icon/tick.png" alt=""/>
            <span> Spedito il <?php echo $order["DataSpedizione"] ?> </span>
        </div>
    <?php endif; ?>
    <?php if($templateParams["statoOrdine"] == "Ordine Ricevuto" || $templateParams["statoOrdine"] == "Ordine Spedito"): ?>
        <div class="mb-2">
            <img class="d-inline-block img-orderState" src="../../img/icon/clock.png" alt=""/>
            <span> Consegna prevista il <?php echo $order["DataSpedizione"] ?> </span>
        </div>
    <?php else: ?>
        <div class="mb-2">
            <img class="d-inline-block img-orderState" src="../../img/icon/tick.png" alt=""/>
            <span> Consegnato il <?php echo $order["DataSpedizione"] ?> </span>
        </div>
    <?php endif; ?>
</div>
