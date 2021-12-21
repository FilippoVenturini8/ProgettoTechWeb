function searchOrders(){
    $.ajax({
        url:"../../php/api/searchOrder.php",    //the page containing php script
        type: "post",    //request type,
        data: {pattern: $("#order-searchbar").val()},
        error: function (xhr, status) {
            console.log(status);
        },
        success: function(data) {
            data = JSON.parse(data);
            document.getElementById("adminOrdersAccordion").innerHTML = "";
            data.forEach(order => {

                let dettagli = ""
                JSON.parse(order.Dettagli).forEach( disco => {
                    dettagli = dettagli + `
                    <p class="mb-0">` + disco.Quantita + `x ` + disco.Titolo + ` - ` + disco.Artista + `</p>`;
                });

                document.getElementById("adminOrdersAccordion").innerHTML = document.getElementById("adminOrdersAccordion").innerHTML +`
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingAdminOrder` + order.CodiceOrdine + `">
                    <button class="accordion-button py-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#adminOrder` + order.CodiceOrdine + `" aria-controls="adminOrder` + order.CodiceOrdine + `">
                        <div class="col-5">
                            <label>Ordine: ` + order.CodiceOrdine + `</label>
                        </div>
                        <div class="col-3">
                            <label>54.99€</label>
                        </div>
                        <div class="col-4">
                            <label>` + order.Stato + `</label>
                        </div>
                    </button>
                    </h2>
                    <div id="adminOrder` + order.CodiceOrdine + `" class="accordion-collapse collapse" aria-labelledby="headingAdminOrder` + order.CodiceOrdine + `" data-bs-parent="#adminOrdersAccordion">
                        <div class="accordion-body">
                            <label class="row fw-bold">#` + order.CodiceOrdine + `</label>
                            <label class="row">
                                <div class="col-4"></div>
                                <div class="col-4 fw-bold">Cliente:</div>
                            </label>
                            <label class="row">
                                <div class="col-4"></div>
                                <div class="col-4">` + order.Nome + " " + order.Cognome + `</div>
                            </label>
                            <label class="row">
                                <div class="col-4"></div>
                                <div class="col-4">` + order.MailAccount + `</div>
                            </label>
                            <label class="row">
                                <div class="col-4"></div>
                                <div class="col-4">` + order.Cellulare+ `</div>
                            </label>

                            <div class="row mt-3">
                                <div class="col-4"></div>
                                <div class="col-3">
                                    <label class="fw-bold">Data Ordine:</label>
                                </div>
                                <div class="col-4">
                                    <label>` + order.DataOrdine+ `</label>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-3">
                                    <label class="fw-bold">Data Spedizione:</label>
                                </div>
                                <div class="col-4">
                                    <label>` + order.DataSpedizione+ `</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-3">
                                    <label class="fw-bold">Data Consegna:</label>
                                </div>
                                <div class="col-4">
                                    <label>` + order.DataConsegna+ `</label>
                                </div>
                            </div>

                            <label class="row mt-3">
                                <div class="col-4"></div>
                                <div class="col-5">` +
                                    dettagli
                                + `</div>
                                <div class="col-3"></div>
                            </label>

                            <label class="row">
                                <div class="col-8"></div>
                                <div class="col-4 text-end fw-bold">
                                    Totale: 54.99€
                                </div>
                            </label>
                        </div>
                    </div>
                </div>`
            });
            if(data.length == 0){
                document.getElementById("adminOrdersAccordion").innerHTML = "<p>Nessun ordine corrispondente alla ricerca</p>";
            }
        }
    });
}