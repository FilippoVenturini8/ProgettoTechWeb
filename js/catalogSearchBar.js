function searchDisks(){
    $.ajax({
        url:"../../php/api/catalogSearchBar.php",    //the page containing php script
        type: "post",    //request type,
        data: {pattern: $("#catalog-searchbar").val()},
        error: function (xhr, status) {
            console.log(status);
        },
        success: function(data) {
            console.log(data);
            data = JSON.parse(data);
            //console.log(data);
            document.getElementById("diskAccordion").innerHTML = "";
            data.forEach(disk => {
                document.getElementById("diskAccordion").innerHTML = document.getElementById("diskAccordion").innerHTML +`
                <div class="accordion-item">
                <h2 id="header${disk.Codice}" class="accordion-header" id="heading${disk.Codice}">
                <button class="accordion-button row mx-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#disk${disk.Codice}" aria-controls="disk${disk.Codice}">
                    <div class="col-1">
                        <label>#${disk.Codice}</label>
                    </div>
                    <div class="col-4 ml-2">
                        <label>${disk.Titolo}</label>
                    </div>
                    <div class="col-3">
                        <label>${disk.Artista}</label>
                    </div>
                    <div class="col-2">
                        <label>${disk.Prezzo}€</label>
                    </div>
                    <div class="col-2">
                        <label>Qtà: ${disk.QuantitaDisponibile}</label>
                    </div>
                </button>
                </h2>
                <div id="disk${disk.Codice}" class="accordion-collapse collapse" aria-labelledby="heading${disk.Codice}" data-bs-parent="#diskAccordion">
                    <div class="accordion-body row" id="modifyAccordion">
                        <div class="col-5 d-flex flex-wrap align-items-center">
                            <img src="../../img/${disk.Copertina}" alt="" class="diskInOrder"></img>
                        </div>
                        <div class="d-inline-block align-top col-7">
                            <div class="row mt-2">
                                <div class="col-12 text-center">
                                    <p>${disk.Titolo} - ${disk.Artista}</p>                          
                                </div>
                            </div>
                            <div class="row text-center">
                                <p>${disk.Prezzo}€</p>
                            </div>
                            <div class="row text-center">
                                <p>Qtà: ${disk.QuantitaDisponibile}</p>
                            </div>
                            <div class="row mt-3">
                                <div class="col-5">
                                    <button type="button" class="btn btn-primary p-1" id="idElimina" data-id="${disk.Codice}" onclick="$('#dataid').val($(this).data('id'));" data-toggle="modal" data-target="#modalDelete">
                                        Elimina
                                    </button>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <input type="hidden"  id="idDisk" value="${disk.Codice}"/>
                                    <button type="button" class="btn btn-primary p-1" name="btnModifica" data-id="${disk.Codice}"  onclick="">
                                        Modifica
                                    </button>
                                </div>
                            </div>                         
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