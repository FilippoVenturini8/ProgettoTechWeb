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
            console.log(data);
            //location.reload();
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
                document.getElementById("diskInCart" + codiceDisco).remove();
                document.getElementById("cartTotal").innerHTML = "Totale: " + data.totale + "€";
            }
        }
    });
}