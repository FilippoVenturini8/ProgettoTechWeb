function alterQuantity(codiceDisco, operazione){
    if(operazione == "i"){
        $.ajaxSetup ({
            cache: false
        });
        $.ajax({
            url:"../../php/api/modifyQuantityInCart.php",    //the page containing php script
            type: "post",    //request type,
            data: {codiceDisco: codiceDisco, op: operazione},
            error: function (xhr, status) {
                console.log(status);
            },
            success: function(data) {
                console.log(data);
               //location.reload();
            }
        });
    } else if(operazione == "d"){
        $.ajax({
            url:"../../php/api/modifyQuantityInCart.php",    //the page containing php script
            type: "post",    //request type,
            data: {codiceDisco: codiceDisco, op: operazione},
            error: function (xhr, status) {
                console.log(status);
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