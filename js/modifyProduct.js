$(document).ready(function () {
    $("button[name='btnModifica']").on('click', function () {
        var val = $(this).attr("data-id");
        var id ="disk" + val;
        /*console.log(val);*/
        console.log(val);

        $.ajax({
            url:"../../php/api/searchDisk.php",    //the page containing php script
            type: "post",    //request type,
            data: {Codice: val},
            error: function (xhr, status) {
                console.log(status);
            },
            success: function(data) {
                //console.log(data);
                data = JSON.parse(data);
                //console.log(data);
                data.forEach(disk => {
                    document.getElementById(id).innerHTML =`
                    <div class="accordion-body" id="modifyAccordion">
                        <div class="d-inline-block align-top">
                            <img src="../../img/`+ disk.Copertina +`" alt="" class="diskInOrder"></img>
                        </div>
                        <div class="d-inline-block align-top">
                            <form>
                            
                                <p class="m-0"><input type="text"  id="txtArtista" value="`+ disk.Artista +`"/> - <input type="text"  id="txtTitolo" value="`+ disk.Titolo +`"/></p>                          
                                <p><input type="text"  id="txtPrezzo" value="`+ disk.Prezzo +`"/>€ <input type="text"  id="txtQta" value="`+ disk.QuantitaDisponibile +`"/></p>
                                <p>
                                    <button type="button" class="btn btn-primary" id="btnSalva" data-id="`+ disk.Codice +`"  onclick="saveDisks()">
                                    <input type="hidden"  id="txtIdDisk" value="`+ disk.Codice +`"/>
                                        Salva
                                    
                                    </button>
                                    <button type="button" class="btn btn-primary" id="idElimina" data-id="`+ disk.Codice +`" onclick="cancelChangesProduct()">
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