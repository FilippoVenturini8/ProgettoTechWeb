<script src="../../js/catalogSearchBar.js"></script>
<script src="../../js/modifyProduct.js"></script>
<script src="../../js/saveModifyProduct.js"></script>
<script src="../../js/cancelChangesProduct.js"></script>
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
    <div class="col-2 col-md-4"></div>
    <div class="col-8 col-md-4">
        <div class="input-group form-outline d-flex justify-content-center">
            <div class="w-75 form-outline">
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
    <div class="col-md-2 col-0"></div>
    <div class="col-md-8 col-12 accordion px-4" id="diskAccordion">
        <?php foreach($templateParams["allDisks"] as $disk): ?> 
            <div class="accordion-item">
                <h2 id="header<?php echo $disk["Codice"]?>" class="accordion-header">
                <button class="accordion-button pt-3 row mx-0 <?php if(!isset($templateParams["idFinishedDisk"])){ echo "collapsed";}?> <?php if(isset($templateParams["idFinishedDisk"]) && $disk["Codice"] != $templateParams["idFinishedDisk"]){echo "collapsed";}?>" type="button" data-bs-toggle="collapse" data-bs-target="#disk<?php echo $disk["Codice"]?>" aria-controls="disk<?php echo $disk["Codice"]?>">
                    <div class="col-1">
                        <label>#<?php echo $disk["Codice"]?></label>
                    </div>
                    <div class="col-4 ml-2">
                        <label><?php echo $disk["Titolo"]?></label>
                    </div>
                    <div class="col-5">
                        <label><?php echo $disk["Artista"]?></label>
                    </div>
                    <div class="col-2">
                        <label>Qt??: <?php echo $disk["QuantitaDisponibile"]?></label>
                    </div>
                </button>
                </h2>
                <div id="disk<?php echo $disk["Codice"]?>" class="accordion-collapse collapse <?php if(isset($templateParams["idFinishedDisk"]) && $disk["Codice"] == $templateParams["idFinishedDisk"]){echo "show";}?>" aria-labelledby="heading<?php echo $disk["Codice"]?>" data-bs-parent="#diskAccordion">
                    <div class="accordion-body row" id="modifyAccordion">
                        <div class="col-5 d-flex flex-wrap align-items-center">
                            <img src="<?php echo UPLOAD_DIR.$disk["Copertina"] ;?>" alt="" class="diskInOrder"/>
                        </div>
                        <div class="d-inline-block align-top col-7">
                            <div class="row mt-2">
                                <div class="col-12 col-md-6 text-center">
                                    <p><?php echo $disk["Titolo"]?> - <?php echo $disk["Artista"];?></p>                          
                                </div>
                                <div class="col-0 col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 text-center">
                                    <p><?php echo $disk["Prezzo"];?>???</p>
                                </div>
                                <div class="col-0 col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 text-center">
                                    <p>Qt??: <?php echo $disk["QuantitaDisponibile"];?></p>
                                </div>
                                <div class="col-0 col-md-3"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-5 col-md-3 text-end">
                                    <button type="button" class="btn btn-primary p-1" id="idElimina" data-id="<?php echo $disk["Codice"]?>" onclick="$('#dataid').val($(this).data('id'));" data-toggle="modal" data-target="#modalDelete">
                                        Elimina
                                    </button>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5 col-md-2">
                                    <input type="hidden"  id="idDisk" value="<?php echo $disk["Codice"]?>"/>
                                    <button type="button" class="btn btn-primary p-1" name="btnModifica" data-id="<?php echo $disk["Codice"]?>"  onclick="modifyProduct(<?php echo $disk['Codice']?>)">
                                        Modifica
                                    </button>
                                </div>
                                <div class="col-0 col-md-6"></div>
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
