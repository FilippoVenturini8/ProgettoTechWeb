<script src="../../js/payment.js" type="text/javascript"></script>

<div class="row mx-2 my-4">
    <div class="col-0 col-md-1"></div>
    <div class="col-12 col-md-11">
        <h1>
            <span class="border-bottom border-danger border-2 py-1">Pagamento e spedizione</span>
        </h1>
    </div>
</div>

<div class="card mx-auto" style="width: 25rem;">
  <img src="../../img/icon/spedizione.png" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text fst-italic text-center">Via Cesare Pavese, 50, Cesena, FC</p>
  </div>
</div>

<div class="row mx-4 mt-4">
    <div class="col-0 col-md-1"></div>
    <div class="col-12 col-md-11">
        <h3>
            <span class="border-bottom border-danger border-2 py-1">Riepilogo:</span>
        </h3>
    </div>
</div>

<div class="row">
    <div class="col-0 col-md-3"></div>
    <div class="col-12 col-md-6">
        <ul class="list-group list-group-flush mx-5 mt-3 border border-secondary">
            <?php foreach ($templateParams["disksInCart"] as $disk):?>
                <li class="list-group-item"><?php echo $disk["Quantita"]?>x <?php echo $disk["Titolo"]?> - <?php echo $disk["Artista"]?></li>
            <?php endforeach?>
            <li class="list-group-item text-end"><label>Totale:</label><label class="fw-bold mx-3"><?php echo round($templateParams["cartTotal"][0]["Totale"], 2)?>€</label></li>
        </ul>
    </div>
</div>

<div class="row m-4">
    <div class="col-0 col-md-1"></div>
    <div class="col-12 col-md-11">
        <h3>
            <span class="border-bottom border-danger border-2 py-1">Pagamento:</span>
        </h3>
    </div>
</div>

<form autocomplete="on">
    <div class="row mx-4">
        <div class="col-1 col-md-4"></div>
        <div class="col-3 col-md-2">
            <label for="numerocarta">Numero carta:</label>
        </div>
        <div class="col-6 col-md-2">
            <input type="text" placeholder="1234567890123456" id="numerocarta" name="numerocarta"/>
        </div>
    </div>
    <div class="row mx-4 mt-3">
        <div class="col-1 col-md-4"></div>
        <div class="col-3 col-md-2">
            <label for="datascadenza">Data scadenza:</label>
        </div>
        <div class="col-4 col-md-2">
            <input type="text" placeholder="MM-YY" id="datascadenza" name="datascadenza"/>
        </div>
    </div>
    <div class="row mx-4 mt-3">
        <div class="col-1 col-md-4"></div>
        <div class="col-3 col-md-2">
            <label for="cvv">CVV:</label>
        </div>
        <div class="col-4 col-md-2">
            <input type="text" placeholder="123" id="cvv" name="cvv"/>
        </div>
    </div>
    <div class="row my-4">
        <div class ="col-4"></div>
        <div class ="col-4 text-center">
            <input class="btn btn-primary" type="button" value="Paga"/>
        </div>
    </div>
</form>

<!-- Modal -->
<div class="modal fade" id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header row">
                <div class="col-4">
                    <img src="../../img/icon/logo.png" alt="" style="width:80px; height:60px;"/>
                </div>
                <div class="col-4 text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Pagamento</h5>
                </div>
                <div class="col-2"></div>
                <div class="col-2">
                    <button class="btn btn-default" data-dismiss="modal">
                        <img class="closeIcon" src="../../img/icon/close.png" alt=""/>
                    </button>
                </div>
            </div>

            <div class="modal-body text-center">
                <img class="fw-bold mt-5" src="../../img/icon/tick.png" alt="" style="width:100px; height:100px;"/>
                <p class="fw-bold mt-5">Pagamento effettuato con successo!</p>
            </div>

            <div class="modal-footer">
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary px-2 py-1" data-dismiss="modal" onclick="location.href = '../../php/api/processOrder.php';">Chiudi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
