$(document).ready(function () {
    $("button[name='btnModifica']").on('click', function () {
        var val = $(this).attr("data-id");
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

                data.forEach(disk => {
                    document.getElementById(id).innerHTML =`
                    <div class="accordion-body" id="modifyAccordion">
                        <div class="d-inline-block align-top">
                            <img src="../../img/`+ disk.Copertina +`" alt="" class="diskInOrder"></img>
                        </div>
                        <div class="d-inline-block align-top">
                            <form action="../../php/api/processModifyProduct.php" method="POST" enctype="multipart/form-data">
                            
                                <p class="m-0"><input type="text" size="9"  id="txtTitolo`+ disk.Codice + `" value="`+ disk.Titolo +`"/> - <input type="text" size="9" id="txtArtista`+ disk.Codice + `" value="`+ disk.Artista +`"/></p>                          
                                <p><input type="text"  size="2" id="txtPrezzo`+ disk.Codice + `" value="`+ disk.Prezzo +`"/>€  &emsp;&emsp; Qtà: <input type="text"  size="2" id="txtQta`+ disk.Codice + `" value="`+ disk.QuantitaDisponibile +`"/></p>
                                <p class="m-3">
                                    <button type="button" class="btn btn-primary" id="btnSalva" data-id="`+ disk.Codice +`"  onclick="saveDisks(`+ disk.Codice +`)">
                                    <input type="hidden"  id="txtIdDisk`+ disk.Codice + `" value="`+ disk.Codice +`"/>
                                        Salva
                                    
                                    </button>
                                    <button type="button" class="btn btn-primary  m-3" id="idElimina" data-id="`+ disk.Codice +`" onclick="cancelChangesProduct()">
                                        Annulla
                                    </button>
                                </p>
                            <form>                         
                        </div>
                    </div>`;
                });
            }
        }); 
    });   
});