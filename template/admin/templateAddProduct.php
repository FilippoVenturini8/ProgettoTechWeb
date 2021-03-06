<script src="../../js/addProduct.js"></script>
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

    <div class="row form-group mt-4">
        <div class="col-2 col-md-4"></div>
        <div class="col-8 col-md-4">
            <label for="titolo">Titolo:</label>
            <input required id="titolo" name="titolo" class="form-control" type="text" autocomplete="off"/>
        </div>
    </div>

    <div class="row form-group mt-3">
        <div class="col-2 col-md-4"></div>
        <div class="col-8 col-md-4">
            <label for="artista">Artista:</label>
            <input required id="artista" name="artista" class="form-control" type="text" autocomplete="off"/>
        </div>
    </div>

    <div class="row form-group mt-3">
        <div class="col-2 col-md-4"></div>
        <div class="col-8 col-md-4">
            <label for="prezzo">Prezzo:</label>
            <input required id="prezzo" name="prezzo" class="form-control" type="number" step="0.01"/>
        </div>
    </div>

    <div class="row form-group mt-3">
        <div class="col-2 col-md-4"></div>
        <div class="col-8 col-md-4">
            <label for="quantita">Quantit??:</label>
            <input required id="quantita" name="quantita" class="form-control" type="number" min="1"/>
        </div>
    </div>

    <div class="row form-group mt-3">
        <div class="col-2 col-md-4"></div>
        <div class="col-8 col-md-4">
            <label for="datauscita">Data uscita:</label>
            <input required id="datauscita" name="datauscita" class="form-control" type="date"/>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-2 col-md-4"></div>
        <div class="col-8 col-md-4">
            <input required id="copertina" name="copertina" class="form-control" type="file" accept=".jpg,.jpeg,.png"/>
        </div>
    </div>

    <div class="row mt-5 mb-4">
        <div class="row">
            <div class="col-2 col-md-4 me-3"></div>
            <div class="col-8 col-md-4 px-0 pe-2">
                <input class="span2" id="categoria" name="categoria" type="hidden"/>
                <div class="input-group">
                    <button class="btn btn-outline-secondary dropdown-toggle dropDown py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">Categoria</button>
                    <ul class="dropdown-menu w-100">
                        <?php foreach($templateParams["categories"] as $category):?>
                            <li onclick="$('#categoria').val(`<?php echo $category['Nome']?>`);"><a class="dropdown-item"><?php echo $category["Nome"]?></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>  
            </div>           
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-4"></div>
        <div class="col-4 mt-5 d-flex justify-content-center">
            <input class="btn btn-primary" type="submit" value="Aggiungi"/>
        </div>
    </div>
</form>