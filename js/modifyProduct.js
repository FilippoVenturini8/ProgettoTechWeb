function modifyProduct(val){
        //var val = $(this).attr("data-id");
    var id ="disk" + val;
    $.ajax({
        url:"../../php/api/searchDisk.php", 
        type: "post",  
        data: {Codice: val},
        error: function (xhr, status) {
            console.log(status);
        },
        success: function(data) {
            data = JSON.parse(data);
            $("head").append(``);
            data.forEach(disk => {
                document.getElementById(id).innerHTML =`
                
                <div class="row accordion-body" id="modifyAccordion">
                    <div class="col-5 d-flex flex-wrap align-items-center">
                        <img src="../../img/`+ disk.Copertina +`" alt="" class="diskInOrder"></img>
                    </div>
                    <form class = "col-7" action="../../php/api/processModifyProduct.php" method="POST" enctype="multipart/form-data">
                        <div class="row text-center mt-2">
                            <div class="col-0 col-md-1"></div>
                            <div class="col-5 col-md-5 px-0">
                                <input type="text" size="8"  id="txtTitolo`+ disk.Codice + `" value="`+ disk.Titolo +`"/>                     
                            </div>
                            <div class="col-1 col-md-1 px-0"><label class="text-center">-</label></div>
                            <div class="col-6 col-md-5 px-0">
                                <input type="text" size="8" id="txtArtista`+ disk.Codice + `" value="`+ disk.Artista +`"/>  
                            </div>
                        </div>
                        <div class="row text-center mt-3">
                            <label><input type="text"  size="2" id="txtPrezzo`+ disk.Codice + `" value="`+ disk.Prezzo +`"/>€</label>  
                        </div>
                        <div class="row text-center mt-3">
                            <div class="col-1"></div>
                            <div class="col-4 px-0 text-end">
                                <label>Qtà: </label>
                            </div>
                            <div class="col-4 px-0 text-start">
                                <input type="text"  size="2" id="txtQta`+ disk.Codice + `" value="`+ disk.QuantitaDisponibile +`"/>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-5">
                                <button type="button" class="btn btn-primary p-1" id="idElimina" data-id="`+ disk.Codice +`" onclick="cancelChangesProduct(`+ disk.Codice +`)">
                                    Annulla
                                </button>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                <input type="hidden"  id="txtIdDisk`+ disk.Codice + `" value="`+ disk.Codice +`"/>
                                <button type="button" class="btn btn-primary p-1" id="btnSalva" data-id="`+ disk.Codice +`"  onclick="saveDisks(`+ disk.Codice +`)">
                                    Salva
                                </button>
                            </div>
                        </div>
                    <form> 
                </div>`;
            });
        }
    }); 
 
};