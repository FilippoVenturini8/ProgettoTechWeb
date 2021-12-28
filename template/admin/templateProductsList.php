<script src="../../js/catalogSearchBar.js" type="text/javascript"></script>
<script src="../../js/modifyProduct.js" type="text/javascript"></script>
<script src="../../js/saveModifyProduct.js" type="text/javascript"></script>
<script src="../../js/cancelChangesProduct.js" type="text/javascript"></script>
<!--LISTINO VINILI-->
    
<div class="row mt-4 mx-2 mb-4">
    <div class="col-10">
        <h1>
            <span class="mx-2 border-bottom border-danger border-2">    
                LISTINO VINILI
            </span>
        </h1>
    </div>
    <div class="col-2"></div>
</div>

<div class="row mb-4">
    <div class="col-2"></div>
    <div class="col-8 px-5">
        <div class="input-group form-outline">
            <div class="form-outline p-0">
                <input type="search" class="form-control" id="catalog-searchbar" placeholder="Search" onchange="searchDisks()"/>
            </div>
            <button type="submit" class="btn btn-primary">
                <img src="../../img/icon/search.png" alt=""/>
            </button>
        </div>
    </div>
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

<div class="row">
    <div class="col-md-1 col-0"></div>
    <div class="col-md-10 col-12 accordion px-4" id="diskAccordion">
        <?php foreach($templateParams["allDisks"] as $disk): ?> 
            <div class="accordion-item">
                <h2 id="header<?php echo $disk["Codice"]?>" class="accordion-header" id="heading<?php echo $disk["Codice"]?>">
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
                <div id="disk<?php echo $disk["Codice"]?>" class="accordion-collapse collapse <?php if(isset($templateParams["idFinishedDisk"]) && $disk["Codice"] == $templateParams["idFinishedDisk"]){echo "show";}?>" aria-labelledby="heading<?php echo $disk["Codice"]?>" data-bs-parent="#diskAccordion">
                    <div class="accordion-body row" id="modifyAccordion">
                        <div class="col-5 d-flex flex-wrap align-items-center">
                            <img src="<?php echo UPLOAD_DIR.$disk["Copertina"] ;?>" alt="" class="diskInOrder"></img>
                        </div>
                        <div class="d-inline-block align-top col-7">
                            <div class="row mt-2">
                                <div class="col-12 text-center">
                                    <p><?php echo $disk["Titolo"]?> - <?php echo $disk["Artista"];?></p>                          
                                </div>
                            </div>
                            <div class="row text-center">
                                <p><?php echo $disk["Prezzo"];?>€</p>
                            </div>
                            <div class="row text-center">
                                <p>Qtà: <?php echo $disk["QuantitaDisponibile"];?></p>
                            </div>
                            <div class="row mt-3">
                                <div class="col-5">
                                    <button type="button" class="btn btn-primary p-1" id="idElimina" data-id="<?php echo $disk["Codice"]?>" onclick="$('#dataid').val($(this).data('id'));" data-toggle="modal" data-target="#modalDelete">
                                        Elimina
                                    </button>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <input type="hidden"  id="idDisk" value="<?php echo $disk["Codice"]?>"/>
                                    <button type="button" class="btn btn-primary p-1" name="btnModifica" data-id="<?php echo $disk["Codice"]?>"  onclick="">
                                        Modifica
                                    </button>
                                </div>
                            </div>                         
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDeleteLabel">Avviso!</h5>
                    <button class="btn btn-default" data-dismiss="modal">
                    <img class="closeIcon" src="../../img/icon/close.png" alt=""/>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Sei sicuro di voler eliminare il prodotto?</p>
                    <input type="hidden"  id="dataid" value=""/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary px-2" data-dismiss="modal">Chiudi</button>
                    <button type="button" class="btn btn-primary px-2" id="btnSi" >Si</button>
                </div>
            </div>
        </div>
    </div>
<div>