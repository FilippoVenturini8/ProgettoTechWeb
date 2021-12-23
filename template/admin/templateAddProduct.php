<script src="../../js/addProduct.js" type="text/javascript"></script>
<div class="row mt-4">
    <div class="col-1"></div>
    <div class="col-11 ml-2">
        <h1>
            <span class="border-bottom border-danger border-2 py-1">
                Aggiungi Disco
            </span>
        </h1>
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

<form action="../../php/api/processNewProduct.php" method="POST" enctype="multipart/form-data">

    <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col-6 text-center">
            <img src="../../img/icon/noImage.png" id="preview" class="img-thumbnail" alt="...">
        </div>
        <div class="col-3"></div>
    </div>

    <div class="form-group mt-4 mx-5 px-5">
        <label for="titolo">Titolo:</label>
        <input id="titolo" name="titolo" class="form-control" type="text" autocomplete="off"/>
    </div>

    <div class="form-group mt-3 mx-5 px-5">
        <label for="artista">Artista:</label>
        <input id="artista" name="artista" class="form-control" type="text" autocomplete="off"/>
    </div>

    <div class="form-group mt-3 mx-5 px-5">
        <label for="prezzo">Prezzo:</label>
        <input id="prezzo" name="prezzo" class="form-control" type="text" autocomplete="off"/>
    </div>

    <div class="form-group mt-3 mx-5 px-5">
        <label for="quantita">Quantità:</label>
        <input id="quantita" name="quantita" class="form-control" type="text" autocomplete="off"/>
    </div>

    <div class="form-group mt-3 mx-5 px-5">
        <label for="datauscita">Data uscita:</label>
        <input id="datauscita" name="datauscita" class="form-control" type="date"/>
    </div>

    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-8">
            <input id="copertina" name="copertina" class="form-control" type="file" accept=".jpg,.jpeg,.png"/>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row mt-3 mb-4">
        <div class="row">
            <div class="col-5"></div>
            <div class="col-4">
                <input class="span2" id="categoria" name="categoria" type="hidden"/>
                <div class="input-group">
                    <button class="btn btn-outline-secondary dropdown-toggle dropDown" type="button" data-bs-toggle="dropdown" aria-expanded="false">Categoria</button>
                    <ul class="dropdown-menu">
                        <li onclick="$('#categoria').val('Rap');"><a class="dropdown-item" href="#">Rap</a></li>
                        <li onclick="$('#categoria').val('Rock');"><a class="dropdown-item" href="#">Rock</a></li>
                        <li onclick="$('#categoria').val('Musica Classica');"><a class="dropdown-item" href="#">Musica Classica</a></li>
                        <li onclick="$('#categoria').val('Reggae');"><a class="dropdown-item"><a class="dropdown-item" href="#">Reggae</a></li>
                    </ul>
                </div>  
            </div>
            <div class="col-3"></div>            
        </div>
    </div>

    <div class="row mt-5 mx-5">
        <div class="col-4"></div>
        <div class="col-4 mx-3">
            <input class="btn btn-primary" type="submit" value="Aggiungi"/>
        </div>
    </div>
</form>