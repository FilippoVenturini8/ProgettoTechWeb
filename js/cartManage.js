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
        $.ajax({
            url:"../../php/api/modifyQuantityInCart.php",    //the page containing php script
            type: "post",    //request type,
            data: {codiceDisco: "aaa", op:"increase"},
            error: function (xhr, status) {
                console.log(status);
            }
        });
    });
});