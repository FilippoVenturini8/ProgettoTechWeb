<div class="m-4">
    <h1>Ordini</h1>
</div>
    <!--singolo ordine-->
    <?php foreach($templateParams["orders"] as $order) :?>
        <div class="row p-2 mt-2 border-bottom border-danger">
            <div  class="col-4 ">
                <div id="carousel<?php echo $order["Codice"] ?>" class="carousel slide" data-interval="false" style="width: 180px;">
                    <div class="carousel-inner w-100">
                        <?php $i=0; foreach($templateParams["ordersDetails"][$order["Codice"]] as $disk) :?>
                            <div class="carousel-item <?php if($i==0){ echo "active";}?> w-100">
                                <img src="<?php echo UPLOAD_DIR.$disk["Copertina"]?>" class="d-block w-100" alt="...">
                            </div>
                        <?php $i=$i+1; endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $order["Codice"] ?>" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $order["Codice"] ?>" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-8 mt-2">
                <div class="row mb-0">
                    <div class="col-3">
                        <label class="m-0 fw-bold">Ordine #<?php echo $order["Codice"]?></label>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-6 text-end">
                        <label class="fw-bold orderState"><?php echo getOrderState($order["DataOrdine"], $order["DataSpedizione"], $order["DataConsegna"]);?></label>
                    </div>
                </div>
                
                <p class="text-end m-0"><?php echo $order["DataOrdine"]?></p>
                <?php foreach($templateParams["ordersDetails"][$order["Codice"]] as $disk) :?>
                    <p>| <?php echo $disk["Artista"]?> - <?php echo $disk["Titolo"]?></p>
                <?php endforeach; ?>
                <a href="../../php/user/trackMyPackage.php?idOrder=<?php echo $order["Codice"]?>" class="btn btn-primary float-end">Traccia il mio pacco</a>
            </div>
        </div>
    <?php endforeach; ?>
    
    