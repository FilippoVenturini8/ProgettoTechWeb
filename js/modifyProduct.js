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
                    <div class="col-4 d-flex flex-wrap align-items-center">
                        <img src="../../img/`+ disk.Copertina +`" alt="" class="diskInOrder"></img>
                    </div>
                    <div class="d-inline-block mx-3 align-top col-7">
                        <form  action="../../php/api/processModifyProduct.php" method="POST" enctype="multipart/form-data">
                            <div class="row mt-2">
                                <div class="col-12 col-md-11 px-0 text-center">
                                <label hidden for="/txtTitolo`+ disk.Codice + `">Titolo: </label>
                                <input type="text" size="10"  id="txtTitolo`+ disk.Codice + `" value="`+ disk.Titolo +`"/>
                                    <label> - </label>
                                <label hidden for="/txtArtista`+ disk.Codice + `">Artista: </label>
                                <input type="text" size="10" id="txtArtista`+ disk.Codice + `" value="`+ disk.Artista +`"/>                     
                                </div>
                                <div class="col-0 col-md-1"></div>
                            </div>
                            <div class="row mt-3">              
                                <div class="col-12 col-md-11 text-center">
                                <label hidden for="/txtPrezzo`+ disk.Codice + `">Prezzo: </label>
                                    <label>Prezzo: <input type="text"  size="4" id="txtPrezzo`+ disk.Codice + `" value="`+ disk.Prezzo +`"/>€</label>  
                                </div>
                                <div class="col-12 col-md-1"></div>
                            </div>
                            <div class="row">
                                
                                <div class="col-12 col-md-11 ml-2 text-center">
                                <label hidden for="/txtQta`+ disk.Codice + `">Quantità: </label>
                                    <label>Quantità: <input  type="text"  size="2" id="txtQta`+ disk.Codice + `" value="`+ disk.QuantitaDisponibile +`"/> Qtà</label>
                                </div>
                                <div class="col-12 col-md-1"></div>
                                
                            </div>
                            <div class="row mt-3">
                                <div class="col-1 col-md-2"></div>
                                <div class="col-4 col-md-2 text-end">
                                    <button type="button" class="btn btn-primary p-1" id="idElimina" data-id="`+ disk.Codice +`" onclick="cancelChangesProduct(`+ disk.Codice +`)">
                                        Annulla
                                    </button>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-4 col-md-2">
                                    <input type="hidden"  id="txtIdDisk`+ disk.Codice + `" value="`+ disk.Codice +`"/>
                                    <button type="button" class="btn btn-primary p-1" id="btnSalva" data-id="`+ disk.Codice +`"  onclick="saveDisks(`+ disk.Codice +`)">
                                        Salva
                                    </button>
                                </div>
                                <div class="col-1 col-md-2"></div>
                            </div>
                        <form>
                    </div> 
                </div>`;
            });
        }
    }); 
 
};