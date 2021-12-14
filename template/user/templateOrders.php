<h1>Ordini</h1>
    <!--singolo ordine-->
    <?php foreach($templateParams["orders"] as $order) :?>
        <div class="row p-2 mt-2 border-bottom border-danger">
            <div  class="col-4">
                <div id="carousel<?php echo $order["Codice"] ?>" class="carousel slide" data-interval="false" style="width: 180px;">
                    <div class="carousel-inner w-100">
                        <?php $i=0; foreach($dbh->getOrderDetails($order["Codice"]) as $disk) :?>
                            <div class="carousel-item <?php if($i==0){ echo "active";}?> w-100">
                                <img src="<?php echo UPLOAD_DIR.$disk["Copertina"]?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption">
                                    <h5><?php echo $disk["Titolo"]?> - <?php echo $disk["Artista"];?></h5>
                                </div>
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
                <p class="m-0 fw-bold">Ordine #<?php echo $order["Codice"]?></p>
                <p class="fw-bold">Ordine ricevuto</p>
                <p>Data Ordine: <?php echo $order["DataOrdine"]?></p>
                <?php foreach($dbh->getOrderDetails($order["Codice"]) as $disk) :?>
                    <p> <?php echo $disk["Artista"]?> - <?php echo $disk["Titolo"]?></p>
                <?php endforeach; ?>
                <a href="../../php/user/trackMyPackage.php?idOrder=<?php echo $order["Codice"]?>" class="btn btn-primary float-end">Traccia il mio pacco</a>
            </div>
        </div>
    <?php endforeach; ?>
    
    