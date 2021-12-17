<?php $order = $templateParams["order"][0]?>
<div class="row mt-4 mx-2">
    <h4>TRACCIA IL MIO PACCO</h4>
</div>
<div class="row m-5">
    <div class="col-1"></div>
    <div class="col-6">
        <label>Ordine#<?php echo $order["CodiceOrdine"]?></label>
    </div>
    <div  class="col-3">
        <div id="carousel<?php echo $order["CodiceOrdine"] ?>" class="carousel slide" data-interval="false" style="width: 180px;">
            <div class="carousel-inner w-100">
                <?php $i=0; foreach($dbh->getOrderDetails($order["CodiceOrdine"]) as $disk) :?>
                    <div class="carousel-item <?php if($i==0){ echo "active";}?> w-100">
                        <img src="<?php echo UPLOAD_DIR.$disk["Copertina"]?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <h5><?php echo $disk["Titolo"]?> - <?php echo $disk["Artista"];?></h5>
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
    <div class="col-2"></div>
</div>

<div class="row">
    <div class="col-3 my-5 py-4 text-end">
        <div class="progress rotated my-5" style="width: 200px;">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 80%"></div>
        </div>
    </div>
    <div class="col-8">
        <div class="row px-5">
            <p>
                <?php if($order["DataOrdine"] == ""){
                    echo "Non ancora ordinato";
                } else {?>
                    <p class="text-danger"><?php echo "Ordinato il ".$order["DataOrdine"];?></p><?php
                }?>
            </p>
        </div>
        <div class="row my-5 px-5">
            <p> 
                <?php if($order["DataSpedizione"] == ""){
                    echo "Non ancora spedito";
                } else {?>
                    <p class="text-danger"><?php echo "Spedito il ".$order["DataSpedizione"];?></p><?php
                }?>
            </p>
        </div>
        <div class="row py-2 px-5">
            <p>
            <?php if($order["DataConsegna"] == ""){
                    echo "Non ancora consegnato";
                } else {?>
                    <p class="text-danger"><?php echo "Consegnato il ".$order["DataConsegna"];?></p><?php
                }?>
            </p>
        </div>
    </div>
    <div class="col-1"></div>
</div>