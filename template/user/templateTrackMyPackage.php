<script src="../../js/trackPackage.js" type="text/javascript"></script>
<?php $order = $templateParams["order"][0]?>
<div class="row mt-4">
    <h1>
        <span class="mx-4 border-bottom border-2 border-danger">
            Traccia il mio pacco #<?php echo $order["CodiceOrdine"]?>
        </span>
    </h1>
</div>

<!--carosello-->
<div class="mx-5 mt-4 d-flex justify-content-center">
    <div id="carousel<?php echo $order["CodiceOrdine"] ?>" class="carousel slide d-inline-block" data-interval="false" style="width: 200px;">
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

<div class="mx-5 mt-5 d-flex justify-content-center">
    <div class="progress" style="height: 20px; width: 280px">
        <div class="progress-bar text-center
        <?php if($templateParams["statoOrdine"] == "Ordine Ricevuto"){
                echo " w-25";
            } else if($templateParams["statoOrdine"] == "Ordine Spedito"){
                echo " w-75";
            } else {
                echo " w-100";
            }
        ?>" role="progressbar"></div>
        <p class="position-absolute mx-5 px-5 fw-bold"><?php echo $templateParams["statoOrdine"]?></p>
    </div>
</div> 

<div class="d-flex justify-content-center">
    <div>
        <div class="mb-2 mt-5">
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
                <span> Consegna prevista il <?php echo $order["DataConsegna"] ?> </span>
            </div>
        <?php else: ?>
            <div class="mb-2">
                <img class="d-inline-block img-orderState" src="../../img/icon/tick.png" alt=""/>
                <span> Consegnato il <?php echo $order["DataConsegna"] ?> </span>
            </div>
        <?php endif; ?>
    </div>
</div>


<div class=" d-flex justify-content-center mt-5 ">
    <div class="accordion" id="mapAccordion" style="width: 25rem;">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingMap">
                <button class="accordion-button collapsed d-block text-center py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMap" aria-expanded="false" aria-controls="collapseMap">
                    Informazioni di consegna ⋁
                </button>
            </h2>
            <div id="collapseMap" class="accordion-collapse collapse" aria-labelledby="headingMap" data-bs-parent="#mapAccordion">
                <div class="accordion-body">
                    <div class="card w-100">
                        <img src="../../img/icon/spedizione.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text fst-italic text-center">Via Cesare Pavese, 50, Cesena, FC</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<span id="openModal" class="hidden" value="<?php if(isset($templateParams["openReview"])){echo "open";}?>"></span>

<div class="modal fade" id="ReviewModal" tabindex="10" role="dialog" aria-labelledby="ReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="ReviewModalLabel">
                    <span class="border-bottom border-danger border-2">
                        Recensione
                    </span>
                </h1>
                <button class="btn btn-default" data-dismiss="modal">
                    <img class="closeIcon" src="../../img/icon/close.png" alt=""/>
                </button>
            </div>
            <div class="modal-body">
                    
            </div>
        </div>
    </div>
</div>
