<script src="../../js/ordersListSearchbar.js"></script>
<div class="row py-3 px-4">
    <h1>
        <span class="mx-sm-2 mx-md-5 border-bottom border-2 border-danger">
            Ordini
        </span>
    </h1>
</div>

<div class="row pb-4">
    <div class="col-2 col-md-4"></div>
    <div class="col-8 col-md-4">
        <div class="input-group form-outline d-flex justify-content-center">
            <div class="w-75 form-outline">
                <input type="search" id="order-searchbar" class="form-control" placeholder="Search"  onchange="searchOrders()"/>
            </div>
            <button type="button" class="btn btn-primary">
                <img src="../../img/icon/search.png" alt=""/>
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2 col-1"></div>
    <div class="col-md-8 col-12 accordion px-4" id="adminOrdersAccordion">
        <?php foreach($templateParams["allOrders"] as $order) : ?>
            <div id="<?php echo $order["CodiceOrdine"];?>" class="accordion-item ms-2">
                <h2 class="accordion-header" id="headingAdminOrder<?php echo $order["CodiceOrdine"]?>">
                <button class="accordion-button py-3 <?php if(!isset($templateParams["idOrderSelected"])){ echo "collapsed";}?> <?php if(isset($templateParams["idOrderSelected"]) && $order["CodiceOrdine"] != $templateParams["idOrderSelected"]){echo "collapsed";}?>" type="button" data-bs-toggle="collapse" data-bs-target="#adminOrder<?php echo $order["CodiceOrdine"]?>" aria-controls="adminOrder<?php echo $order["CodiceOrdine"]?>">
                    <div class="col-5 ps-2">
                        <label>Ordine: <?php echo $order["CodiceOrdine"]?></label>
                    </div>
                    <div class="col-3">
                        <label><?php echo round($dbh->getOrderTotal($order["CodiceOrdine"]),2)?>€</label>
                    </div>
                    <div class="col-4">
                        <label><?php echo getOrderState($order["DataOrdine"],$order["DataSpedizione"],$order["DataConsegna"]);?></label>
                    </div>
                </button>
                </h2>
                <div id="adminOrder<?php echo $order["CodiceOrdine"]?>" class="accordion-collapse collapse <?php if(isset($templateParams["idOrderSelected"]) && $order["CodiceOrdine"] == $templateParams["idOrderSelected"]){echo "show";}?>" aria-labelledby="headingAdminOrder<?php echo $order["CodiceOrdine"]?>" data-bs-parent="#adminOrdersAccordion">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-0 col-md-1"></div>
                            <label class="fw-bold col-1">#<?php echo $order["CodiceOrdine"]?></label>
                        </div>
                        <label class="row">
                            <div class="col-2 col-md-4"></div>
                            <div class="col-4 fw-bold">Cliente:</div>
                        </label>
                        <label class="row mb-2">
                            <div class="col-3"></div>
                            <div class="col-6 col-md-5 text-end"><?php echo $order["Nome"]." ".$order["Cognome"]?></div>
                            <div class="col-1"><img src="../../img/icon/user-icon.png" alt="" class="contactIcon"/></div>
                        </label>
                        <label class="row mb-2">
                            <div class="col-3"></div>
                            <div class="col-6 col-md-5 text-end"><?php echo $order["MailAccount"]?></div>
                            <div class="col-1"><img src="../../img/icon/email-icon.png" alt="" class="contactIcon"/></div>
                        </label>
                        <label class="row mb-2">
                            <div class="col-3"></div>
                            <div class="col-6 col-md-5 text-end"><?php echo $order["Cellulare"]?></div>
                            <div class="col-1"><img src="../../img/icon/phone-icon.png" alt="" class="contactIcon"/></div>
                        </label>

                        <div class="row mt-3">
                            <div class="col-2 col-md-4"></div>
                            <div class="col-5 col-md-3">
                                <label class="fw-bold">Data Ordine:</label>
                            </div>
                            <div class="col-4">
                                <label><?php echo $order["DataOrdine"]?></label>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-2 col-md-4"></div>
                            <div class="col-5 col-md-3">
                                <label class="fw-bold">Data Spedizione:</label>
                            </div>
                            <div class="col-4">
                                <label><?php echo $order["DataSpedizione"]?></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2 col-md-4"></div>
                            <div class="col-5 col-md-3">
                                <label class="fw-bold">Data Consegna:</label>
                            </div>
                            <div class="col-4">
                                <label><?php echo $order["DataConsegna"]?></label>
                            </div>
                        </div>

                        <ul class="list-group list-group-flush mb-4 mt-4 text-center">
                            <?php foreach($dbh->getOrderDetails($order["CodiceOrdine"]) as $disk) : ?>
                                <li class="list-group-item"><?php echo $disk["Quantita"] ?>x <?php echo $disk["Titolo"] ?> - <?php echo $disk["Artista"] ?></li>
                            <?php endforeach; ?>
                        </ul>

                        <label class="row">
                            <div class="col-8"></div>
                            <div class="col-4 text-end fw-bold">
                                Totale: <?php echo round($dbh->getOrderTotal($order["CodiceOrdine"]),2)?>€
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>