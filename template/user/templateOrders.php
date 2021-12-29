<div class="m-4">
    <h1>
        <span class="border-bottom border-danger border-2">
            I Miei Ordini
        </span>
    </h1>
</div>

<div class="row">
    <div class="col-0 col-md-2"></div>
    <div class="col-12 col-md-8">
        <?php $i=0; foreach($templateParams["orders"] as $order) :?>
            <div class="row p-2 <?php if($i==0){echo "border-top";}?> border-start border-end border-bottom border-danger  bg-white">
                <div class="col-4 py-2 px-4 d-flex flex-wrap align-items-center">
                    <div id="carousel<?php echo $order["Codice"] ?>" class="carousel slide" data-interval="false" style="width: 150px;">
                        <div class="carousel-inner w-100">
                            <?php $i=0; foreach($templateParams["ordersDetails"][$order["Codice"]] as $disk) :?>
                                <div class="carousel-item <?php if($i==0){ echo "active";}?> w-100">
                                    <img src="<?php echo UPLOAD_DIR.$disk["Copertina"]?>" class="diskInOrder" alt="...">
                                </div>
                            <?php $i=$i+1; endforeach; ?>
                            <?php if($i > 1): ?>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $order["Codice"] ?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $order["Codice"] ?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="col-8 mt-2 px-4">
                    <div class="row mb-0">
                        <div class="col-5">
                            <label class="m-0 fw-bold">Ordine #<?php echo $order["Codice"]?></label>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-6 text-end">
                            <label class="fw-bold orderState"><?php echo getOrderState($order["DataOrdine"], $order["DataSpedizione"], $order["DataConsegna"]);?></label>
                        </div>
                    </div>
                    
                    <p class="text-end m-0 mb-3"><?php echo $order["DataOrdine"]?></p>

                    <ul class="list-group list-group-flush mb-4">
                        <?php foreach($templateParams["ordersDetails"][$order["Codice"]] as $disk) :?>
                            <li class="list-group-item">
                                <span><?php echo $disk["Quantita"]?>x <?php echo $disk["Artista"]?> - <?php echo $disk["Titolo"]?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                        
                    <div class="text-end">
                        <a href="../../php/user/trackMyPackage.php?idOrder=<?php echo $order["Codice"]?>" class="btn btn-primary">Traccia il mio pacco</a>
                    </div>
                </div>
            </div>
        <?php $i=$i+1; endforeach; ?>
    </div>
</div>

<div class="modal fade" id="ReviewModal" tabindex="-1" role="dialog" aria-labelledby="ReviewModalLabel" aria-hidden="true">
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
            <div class="modal-body  "><!--★-->
                <button class="btn btn-default display-6" data-dismiss="modal">☆</button>
                <button class="btn btn-default" data-dismiss="modal">☆</button>
                <button class="btn btn-default" data-dismiss="modal">☆</button>
                <button class="btn btn-default" data-dismiss="modal">☆</button>
                <button class="btn btn-default" data-dismiss="modal">☆</button>
            </div>
        </div>
    </div>
</div>
    
    