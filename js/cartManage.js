$(document).ready(function (event) {
    $(".cart-minus").on('click', function () {
        $.ajax({
            url:"../../php/api/modifyQuantityInCart.php",    //the page containing php script
            type: "post",    //request type,
            data: {codiceDisco: "aaa", op:"decrease"},
            error: function (xhr, status) {
                console.log(status);
            }
        });
    });

    $(".cart-plus").on('click', function () {
        $.ajaxSetup ({
            cache: false
        });
        $.ajax({
            url:"../../php/api/modifyQuantityInCart.php",    //the page containing php script
            type: "post",    //request type,
            data: {codiceDisco: "aaa", op:"increase"},
            error: function (xhr, status) {
                console.log(status);
            },
            success: function(data) {
               location.reload();
            }
        });
    });

    $(".add-to-cart-button").on('click', function () {
        $.ajax({
            url:"../../php/api/addToCart.php",
            type: "post",
            data: {codiceDisco: this.id},
            error: function (xhr, status) {
                console.log(status);
            },
        });
    });
    
});