function alterQuantity(codiceDisco, operazione){
    if(operazione == "i"){
        $.ajax({
            url:"../../php/api/modifyQuantityInCart.php",
            type: "post",    //request type,
            data: {codiceDisco: codiceDisco, op: operazione},
            error: function (xhr, status) {
                console.log(status);
            },
            success: function(data) {
               console.log(data);
               data = JSON.parse(data);
               if(!data.hasOwnProperty('errore')){
                    document.getElementById("cartQt" + codiceDisco).innerHTML = data.quantita;
                    document.getElementById("diskSubTotal" + codiceDisco).innerHTML = data.subtotale + "€";
                    document.getElementById("cartTotal").innerHTML = "Totale: " + data.totale + "€";
               }
            }
        });
    } else if(operazione == "d"){
        $.ajax({
            url:"../../php/api/modifyQuantityInCart.php",
            type: "post",    //request type,
            data: {codiceDisco: codiceDisco, op: operazione},
            error: function (xhr, status) {
                console.log(status);
            },
            success: function(data) {
                data = JSON.parse(data); 
                if(!data.hasOwnProperty('errore')){
                    document.getElementById("cartQt" + codiceDisco).innerHTML = data.quantita;
                    document.getElementById("diskSubTotal" + codiceDisco).innerHTML = data.subtotale + "€";
                    document.getElementById("cartTotal").innerHTML = "Totale: " + data.totale + "€";
                }
            }
        });
    }
}

function addDiskToCart(codiceDisco){
    $.ajax({
        url:"../../php/api/addToCart.php",
        type: "post",
        data: {codiceDisco: codiceDisco},
        error: function (xhr, status) {
            console.log(status);
        },
        success: function(data) {
            data = JSON.parse(data);
            if(!data.hasOwnProperty('errore')){
                if(document.getElementById("add" + codiceDisco) != null){
                    document.getElementById("add" + codiceDisco).outerHTML = `<button id="remove` + codiceDisco + `" class="btn btn-default mx-0 add-to-cart-button text-end" onclick="removeFromCart(` + data.codice + `)">
                                                                              <img src="../../img/icon/minus2.png" alt=""/> 
                                                                          </button>`;
                }
                $("aside.float-end ul").append(`<li class="list-group-item row m-0 border-bottom " id="diskInCart` + data.codice + `">
                                                    <div class="align-top row">
                                                        <div class="col-4">
                                                            <img class="rounded d-block" src="../../img/` + data.copertina + `" alt=""/>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="row">
                                                                <div class="col-10">
                                                                    <p class="fw-bold mb-0">` + data.titolo + `</p>
                                                                </div>
                                                                <div class="col-2 text-end">
                                                                    <button class="btn btn-default cart-delete" onclick="removeFromCart(` + data.codice + `)">
                                                                        <img src="../../img/icon/close.png" alt=""/>
                                                                    </button> 
                                                                </div>
                                                            </div>
                                                            <p class="">` + data.artista + `</p>
                                                            <div class="mt-2 row mx-0 py-0">
                                                                <div class="col-2 px-0 text-end">
                                                                    <button class="btn btn-default mx-0 cart-minus" onclick="alterQuantity(` + data.codice + `, 'd')">
                                                                        <img src="../../img/icon/minus2.png" alt=""/>
                                                                    </button> 
                                                                </div>
                                                                <div class="col-1 px-0 text-center">
                                                                    <p id="cartQt` + data.codice + `" class="pt-1">1</p>
                                                                </div>
                                                                <div class="col-2 px-0 text-start">
                                                                    <button class="btn btn-default mx-0 cart-plus" onclick="alterQuantity(` + data.codice + `, 'i')">
                                                                        <img src="../../img/icon/plus2.png" alt=""/> 
                                                                    </button> 
                                                                </div>
                                                                <div class="col-5"></div>
                                                                <div class="col-2">
                                                                    <p id="diskSubTotal` + data.codice + `" class="pt-1">` + data.prezzo + `€</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>`);
                document.getElementById("cartTotal").innerHTML = "Totale: " + data.totale + "€";
            }
        }
    });
}

function removeFromCart(codiceDisco){
    $.ajax({
        url:"../../php/api/removeFromCart.php",
        type: "post",
        data: {codiceDisco: codiceDisco},
        error: function (xhr, status) {
            console.log(status);
        },
        success: function(data) {
            console.log(data);
            data = JSON.parse(data); 
            if(!data.hasOwnProperty('errore')){
                if(document.getElementById("remove" + codiceDisco) != null){
                    document.getElementById("remove" + codiceDisco).outerHTML = `<button id="add` + codiceDisco + `" class="btn btn-default mx-0 add-to-cart-button text-end" onclick="addDiskToCart(` + codiceDisco + `)">
                                                                                    <img src="../../img/icon/plus2.png" alt=""/> 
                                                                                </button>`;
                }
                document.getElementById("diskInCart" + codiceDisco).remove();
                document.getElementById("cartTotal").innerHTML = "Totale: " + data.totale + "€";
            }
        }
    });
}