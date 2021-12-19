<div class="row mx-2 my-4">
    <h1>Pagamento e spedizione</h1>
</div>

<div class="row m-4">
    <h2>Indirizzo di spedizione:</h2>
</div>

<div class="text-center">
    <img src="../../img/icon/spedizione.png" class="icon-map" alt="" />
</div>

<div class="row mt-2">
    <div class="col-1"></div>
    <div class="col-3"></div>
    <div class="col-8 text-start">
        <p>Via Cesare Pavese, 50, Cesena, FC</p>
    </div>
</div>

<div class="row mx-4">
    <h3>Riepilogo:</h3>
</div>

<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        <ul class="list-unstyled">
            <?php foreach ($templateParams["disksInCart"] as $disk):?>
                <li class="mb-1">|<?php echo $disk["Quantita"]?>x <?php echo $disk["Titolo"]?> - <?php echo $disk["Artista"]?></li>
            <?php endforeach?>
        </ul>
    </div>
</div>

<div class="row mx-4">
    <div class="col-4">
        <label>Totale:</label>
    </div>
    <div class="col-2">
        <label><?php echo round($templateParams["cartTotal"][0]["Totale"], 2)?></label>
    </div>
</div>

<div class="row m-4">
    <h3>Pagamento:</h3>
</div>

<form>
    <div class="row mx-4">
        <div class="col-1"></div>
        <div class="col-3">
            <label for="numerocarta">Numero carta:</label>
        </div>
        <div class="col-6">
            <input type="text" placeholder="1234567890123456" id="numerocarta" name="numerocarta"/>
        </div>
    </div>
    <div class="row mx-4 mt-3">
        <div class="col-1"></div>
        <div class="col-3">
            <label for="datascadenza">Data scadenza:</label>
        </div>
        <div class="col-4">
            <input type="text" placeholder="MM-YY" id="datascadenza" name="datascadenza"/>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row mx-4 mt-3">
        <div class="col-1"></div>
        <div class="col-3">
            <label for="cvv">CVV:</label>
        </div>
        <div class="col-4">
            <input type="text" placeholder="123" id="cvv" name="cvv"/>
        </div>
    </div>
    <div class="row my-4">
        <div class ="col-4"></div>
        <div class ="col-4 text-center">
            <input class="btn btn-primary" type="button" value="Paga" data-toggle="modal" data-target="#exampleModal"/>
        </div>
    </div>
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pagamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.href = '../../php/user/orders.php';">
            <img src="../../img/icon/close.png" alt=""/>
        </button>
      </div>
      <div class="modal-body">
        <label>Pagamento effettuato con successo!</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.href = '../../php/user/orders.php';">Chiudi</button>
      </div>
    </div>
  </div>
</div>
