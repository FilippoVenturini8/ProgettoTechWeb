<?php $order = $templateParams["order"][0]?>
<div class="row mt-4 mx-2">
    <h4>TRACCIA IL MIO PACCO</h4>
</div>
<div class="row m-5">
    <div class="col-8">
        <label>Ordine#<?php echo $order["CodiceOrdine"]?></label>
    </div>
    <div  class="col-4">
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
</div>

<div class="row">
    <div class="col-3 my-5 py-5">
        <div class="progress rotated my-5" style="width: 280px;">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 70%"></div>
        </div>
    </div>
    <div class="col-8">
        <div class="row">
            <div class="col-12">
                <p>Ordinato martedì 16 novembre</p>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12">
                <p>Spedito oggi</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>In consegna</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <p>Consegnato</p>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
</div>