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
    <h5>Ordini</h5>
</div>
<div class="accordion">
    <?php foreach($templateParams["allOrders"] as $order) : ?>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button row" type="button" data-bs-toggle="collapse" data-bs-target="#order<?php echo $order["CodiceOrdine"]?>">
                <div class="col-5">
                    <label>Codice ordine: <?php echo $order["CodiceOrdine"]?></label>
                </div>
                <div class="col-3">
                    <label>54.99€</label>
                </div>
                <div class="col-4">
                    <label>In consegna</label>
                </div>
            </button>
            </h2>
            <div id="order<?php echo $order["CodiceOrdine"]?>" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <label class="row">Codice ordine: <?php echo $order["CodiceOrdine"]?></label>
                    <label class="row">Cliente: <?php echo $order["Nome"]." ".$order["Cognome"]?></label>
                    <label class="row">Stato: In consegna</label>
                    <?php foreach($dbh->getOrderDetails($order["CodiceOrdine"]) as $disk) : ?>
                        <label class="row"><?php echo $disk["Quantita"] ?>x <?php echo $disk["Titolo"] ?> - <?php echo $disk["Artista"] ?></label>
                    <?php endforeach; ?>
                    <label class="row">Totale: 54.99€</label>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>