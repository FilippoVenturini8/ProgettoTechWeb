<script src="../../js/productListSearchBar.js" type="text/javascript"></script>
<script src="../../js/modifyProduct.js" type="text/javascript"></script>
<script src="../../js/saveModifyProduct.js" type="text/javascript"></script>
<script src="../../js/cancelChangesProduct.js" type="text/javascript"></script>
<!--LISTINO VINILI-->
<div class="row mt-3">
    <div class="col-12">
        <div class="mx-5 input-group form-outline">
            <div class="form-outline">
                <input type="search" class="form-control" id="disk-searchbar" placeholder="Search" onchange="searchDisks()"/>
            </div>
            <button type="submit" class="btn btn-primary">
                <img src="../../img/icon/search.png" alt=""/>
            </button>
        </div>
    </div>
</div>
    
<div class="row m-5">
    <div class="col-10">
        <h1>
            <span class="mx-4 border-bottom border-danger">    
                LISTINO VINILI
            </span>
        </h1>
    </div>
    <div class="col-2"></div>
</div>

<div class="modal fade" id="modalResultInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Aggiunta nuovo disco</h5>
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

<div class="accordion px-4" id="diskAccordion">
        <?php foreach($templateParams["allDisks"] as $disk): ?> 
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $disk["Codice"]?>">
                <button class="accordion-button row mx-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#disk<?php echo $disk["Codice"]?>" aria-controls="disk<?php echo $disk["Codice"]?>">
                    <div class="col-1">
                        <label>#<?php echo $disk["Codice"]?></label>
                    </div>
                    <div class="col-4 ml-2">
                        <label><?php echo $disk["Titolo"]?></label>
                    </div>
                    <div class="col-3">
                        <label><?php echo $disk["Artista"]?></label>
                    </div>
                    <div class="col-2">
                        <label><?php echo $disk["Prezzo"]?>€</label>
                    </div>
                    <div class="col-2">
                        <label>Qtà: <?php echo $disk["QuantitaDisponibile"]?></label>
                    </div>
                </button>
                </h2>
                <div id="disk<?php echo $disk["Codice"]?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $disk["Codice"]?>" data-bs-parent="#diskAccordion">
                    <div class="accordion-body" id="modifyAccordion">
                        <div class="d-inline-block align-top">
                            <img src="<?php echo UPLOAD_DIR.$disk["Copertina"] ;?>" alt="" class="diskInOrder"></img>
                        </div>
                        <div class="d-inline-block align-top">
                            <p class="m-0"><?php echo $disk["Artista"];?> - <?php echo $disk["Titolo"]?></p>                          
                            <p><?php echo $disk["Prezzo"];?>€</p>
                            <p>
                                <button type="button" class="btn btn-primary" id="btnModifica" data-id="<?php echo $disk["Codice"]?>"  onclick="">
                                <input type="hidden"  id="idDisk" value="<?php echo $disk["Codice"]?>"/>
                                    Modifica
                                </button>
                                <button type="button" class="btn btn-primary" id="idElimina" data-id="<?php echo $disk["Codice"]?>" onclick="$('#dataid').val($(this).data('id'));" data-toggle="modal" data-target="#exampleModal">
                                    Elimina
                                </button>
                            <p>                         
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Avviso!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Sei sicuro di voler eliminare il prodotto?</p>
                    <input type="hidden"  id="dataid" value=""/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                    <button type="button" class="btn btn-primary" id="btnSi" >Si</button>
                </div>
            </div>
        </div>
    </div>
<div>