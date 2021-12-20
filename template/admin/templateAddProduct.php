<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-11 ml-2">
        <h5>Aggiungi Prodotto</h5>
    </div>
</div>

<div class="modal fade" id="modalResultInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Errore aggiunta disco</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img class="closeIcon" src="../../img/icon/close.png" alt=""/>
                </button>
            </div>
            <div class="modal-body">
                <label></label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>

<?php if(isset($templateParams["formmsg"])):?>
    <script>
        $('#modalResultInsert').modal('show');
        $('.modal-body').text('<?php echo $templateParams["formmsg"];?>');
    </script>
<?php endif; ?>

<form action="../../php/api/processNewProduct.php" method="POST">
    <div class="row mt-4 mb-4">
        <div class="col-1"></div>
        <div class="col-3 pt-1">
            <label for="titolo">Titolo:</label>
        </div>
        <div class="col-6">
            <input id="titolo" name="titolo" class="form-control" type="text" autocomplete="off"/>
        </div>
        <div class="col-2"></div>            
    </div>

    <div class="row mb-4">
        <div class="col-1"></div>
        <div class="col-3 pt-1">
            <label for="artista">Artista:</label>
        </div>
        <div class="col-6">
            <input id="artista" name="artista" class="form-control" type="text" autocomplete="off"/>
        </div>
        <div class="col-2"></div>                 
    </div> 

    <div class="row mb-4">
        <div class="col-1"></div>
        <div class="col-3 pt-1">
            <label for="prezzo">Prezzo:</label>
        </div>
        <div class="col-6">
            <input id="prezzo" name="prezzo" class="form-control" type="text" autocomplete="off"/>
        </div>
        <div class="col-2"></div>                 
    </div>

    <div class="row mb-4">
        <div class="col-1"></div>
        <div class="col-3 pt-1">
            <label for="quantita">Quantità:</label>
        </div>
        <div class="col-6">
            <input id="quantita" name="quantita" class="form-control" type="text" autocomplete="off"/>
        </div>
        <div class="col-2"></div>                 
    </div>

    <div class="row mb-4">
        <div class="col-1"></div>
        <div class="col-3 pt-1">
            <label for="datauscita">Data uscita:</label>
        </div>
        <div class="col-6">
            <input id="datauscita" name="datauscita" class="form-control" type="date"/>
        </div>
        <div class="col-2"></div>                 
    </div>

    <div class="row mb-4">
        <div class="row">
            <div class="col-5"></div>
            <div class="col-4">
                <div class="input-group">
                    <button class="btn btn-outline-secondary dropdown-toggle orderBy" type="button" data-bs-toggle="dropdown" aria-expanded="false">Categoria</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Rap</a></li>
                        <li><a class="dropdown-item" href="#">Rock</a></li>
                        <li><a class="dropdown-item" href="#">Musica Classica</a></li>
                        <li><a class="dropdown-item" href="#">Reggae</a></li>
                    </ul>
                </div>  
            </div>
            <div class="col-3"></div>            
        </div>
    </div>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <input id="copertina" name="copertina" class="form-control" type="file" accept=".jpg,.jpeg,.png"/>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row mt-5 mx-5">
        <div class="col-4"></div>
        <div class="col-4 mx-3">
            <input class="btn btn-primary" type="submit" value="Aggiungi"/>
        </div>
    </div>
</form>