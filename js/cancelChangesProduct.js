function cancelChangesProduct(val){
    //var val = $(this).attr("data-id");
    var id ="disk" + val;
    console.log(val);
    $.ajax({
        url:"../../php/api/searchDisk.php", 
        type: "post",  
        data: {Codice: val},
        error: function (xhr, status) {
            console.log(status);
        },
        success: function(data) {
            data = JSON.parse(data);
            data.forEach(disk => {
                document.getElementById(id).innerHTML =`
                    <div class="accordion-body row" id="modifyAccordion">
                        <div class="col-5 d-flex flex-wrap align-items-center">
                            <img src="../../img/`+ disk.Copertina +`" alt="" class="diskInOrder"></img>
                        </div>
                        <div class="d-inline-block align-top col-7">
                            <div class="row mt-2">
                                <div class="col-12 col-md-6 text-center">
                                    <p>`+ disk.Titolo +` - `+ disk.Artista +`</p>                          
                                </div>
                                <div class="col-0 col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 text-center">
                                    <p>`+ disk.Prezzo +`€</p>
                                </div>
                                <div class="col-0 col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 text-center">
                                    <p>Qtà: `+ disk.QuantitaDisponibile +`</p>
                                </div>
                                <div class="col-0 col-md-3"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-5 col-md-2 text-end">
                                    <button type="button" class="btn btn-primary p-1" id="idElimina" data-id="`+ disk.Codice +`" onclick="$('#dataid').val($(this).data('id'));" data-toggle="modal" data-target="#modalDelete">
                                        Elimina
                                    </button>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5 col-md-2">
                                    <input type="hidden"  id="idDisk" value="`+ disk.Codice +`"/>
                                    <button type="button" class="btn btn-primary p-1" name="btnModifica" data-id="`+ disk.Codice +`"  onclick="modifyProduct(`+ disk.Codice +`)">
                                        Modifica
                                    </button>
                                </div>
                                <div class="col-0 col-md-6"></div>
                            </div>                         
                        </div>
                    </div>
                `;
            });
        }
    }); 
};