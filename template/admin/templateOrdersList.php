<div class="row py-3">
    <div class="form-outline col-7">
        <input type="search" id="form1" class="form-control" placeholder="Search" />
    </div>
    <div class="col-2 text-start">
        <button type="button" class="btn btn-primary te">Cerca</button>
    </div>
    <div class="col-3">
        <div class="input-group">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Ordina per</button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Codice decrescente</a></li>
            <li><a class="dropdown-item" href="#">Codice crescente</a></li>
            <li><a class="dropdown-item" href="#">Totale decrescente</a></li>
            <li><a class="dropdown-item" href="#">Totale crescente</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row py-3">
    <h1>
        <span class="border-bottom border-2 border-danger">
            Ordini
        </span>
    </h1>
</div>
<div class="accordion" id="adminOrdersAccordion">
    <?php foreach($templateParams["allOrders"] as $order) : ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingAdminOrder<?php echo $order["CodiceOrdine"]?>">
            <button class="accordion-button py-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#adminOrder<?php echo $order["CodiceOrdine"]?>" aria-controls="adminOrder<?php echo $order["CodiceOrdine"]?>">
                <div class="col-5">
                    <label>Ordine: <?php echo $order["CodiceOrdine"]?></label>
                </div>
                <div class="col-3">
                    <label>54.99€</label>
                </div>
                <div class="col-4">
                    <label><?php echo getOrderState($order["DataOrdine"],$order["DataSpedizione"],$order["DataConsegna"]);?></label>
                </div>
            </button>
            </h2>
            <div id="adminOrder<?php echo $order["CodiceOrdine"]?>" class="accordion-collapse collapse" aria-labelledby="headingAdminOrder<?php echo $order["CodiceOrdine"]?>" data-bs-parent="#adminOrdersAccordion">
                <div class="accordion-body">
                    <label class="row fw-bold">#<?php echo $order["CodiceOrdine"]?></label>
                    <label class="row">
                        <div class="col-4"></div>
                        <div class="col-4 fw-bold">Cliente:</div>
                    </label>
                    <label class="row">
                        <div class="col-4"></div>
                        <div class="col-4"><?php echo $order["Nome"]." ".$order["Cognome"]?></div>
                    </label>
                    <label class="row">
                        <div class="col-4"></div>
                        <div class="col-4"><?php echo $order["MailAccount"]?></div>
                    </label>
                    <label class="row">
                        <div class="col-4"></div>
                        <div class="col-4"><?php echo $order["Cellulare"]?></div>
                    </label>

                    <div class="row mt-3">
                        <div class="col-4"></div>
                        <div class="col-3">
                            <label class="fw-bold">Data Ordine:</label>
                        </div>
                        <div class="col-4">
                            <label><?php echo $order["DataOrdine"]?></label>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-3">
                            <label class="fw-bold">Data Spedizione:</label>
                        </div>
                        <div class="col-4">
                            <label><?php echo $order["DataSpedizione"]?></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-3">
                            <label class="fw-bold">Data Consegna:</label>
                        </div>
                        <div class="col-4">
                            <label><?php echo $order["DataConsegna"]?></label>
                        </div>
                    </div>


                    <label class="row mt-3">
                        <div class="col-4"></div>
                        <div class="col-5">
                            <?php foreach($dbh->getOrderDetails($order["CodiceOrdine"]) as $disk) : ?>
                                <label><?php echo $disk["Quantita"] ?>x <?php echo $disk["Titolo"] ?> - <?php echo $disk["Artista"] ?></label>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-3"></div>
                    </label>

                    
                    
                    <label class="row">
                        <div class="col-8"></div>
                        <div class="col-4 text-end fw-bold">
                            Totale: 54.99€
                        </div>
                    </label>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>