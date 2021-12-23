function searchDisks(){
    $.ajax({
        url:"../../php/api/searchDisk.php",    //the page containing php script
        type: "post",    //request type,
        data: {pattern: $("#disk-searchbar").val()},
        error: function (xhr, status) {
            console.log(status);
        },
        success: function(data) {
            data = JSON.parse(data);
            //console.log(data);
            document.getElementById("diskAccordion").innerHTML = "";
            data.forEach(disk => {
                document.getElementById("diskAccordion").innerHTML = document.getElementById("diskAccordion").innerHTML +`
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading` + disk.Codice + `">
                    <button class="accordion-button row mx-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#disk` + disk.Codice + `" aria-controls="disk` + disk.Codice + `">
                        <div class="col-1">
                            <label>#` + disk.Codice + `</label>
                        </div>
                        <div class="col-4 ml-2">
                            <label>` + disk.Titolo+ `</label>
                        </div>
                        <div class="col-3">
                            <label>` + disk.Artista+ `</label>
                        </div>
                        <div class="col-2">
                            <label>` + disk.Prezzo+ `€</label>
                        </div>
                        <div class="col-2">
                            <label>Qtà: ` + disk.QuantitaDisponibile+ `</label>
                        </div>
                    </button>
                    </h2>
                    <div id="disk` + disk.Codice + `" class="accordion-collapse collapse" aria-labelledby="heading` + disk.Codice + `" data-bs-parent="#diskAccordion">
                        <div class="accordion-body">
                            <div class="d-inline-block align-top">
                                <img src="../../img/` + disk.Copertina + `" alt="" class="diskInOrder"></img>
                            </div>
                            <div class="d-inline-block align-top">
                                <p class="m-0">` + disk.Artista+ ` - ` + disk.Titolo+ `</p>                          
                                <p>` + disk.Prezzo+ `€</p>
                                <p class="m-3">
                                    <button type="button" class="btn btn-primary" name="btnModifica" data-id="` + disk.Codice + `"  onclick="">
                                    <input type="hidden"  id="idDisk" value="` + disk.Codice + `"/>
                                        Modifica
                                    </button>
                                    <button type="button" class="btn btn-primary m-3" id="idElimina" data-id="` + disk.Codice + `" onclick="$('#dataid').val($(this).data('id'));" data-toggle="modal" data-target="#modalDelete">
                                        Elimina
                                    </button>
                                <p>                         
                            </div>
                        </div>
                    </div>
                </div>`;
            });
            if(data.length == 0){
                document.getElementById("diskAccordion").innerHTML = "<p>Nessun disco corrispondente alla ricerca</p>";
            }
        }
    });
}