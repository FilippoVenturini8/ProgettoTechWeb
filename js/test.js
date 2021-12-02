$(document).ready(function () {

    //close cart
    $('aside.float-end button').on('click', function () {
        $('aside.float-end').addClass('collapse');
        $('aside.float-end').removeClass('active');
    });

    //open cart
    $('body > div > header > div:last-of-type > button').on('click', function () {
        $("aside.active")
            .addClass("collapse")
            .removeClass("active");
        
        $('aside.float-end').addClass('active');
        $('aside.float-end').removeClass('collapse');
    });

    //close menu
    $('aside.float-start > header > button:first-of-type').on('click', function () {
        $('aside.float-start').addClass('collapse');
        $('aside.float-start').removeClass('active');
    });

    //open menu
    $('body > div > header > div:first-of-type > button').on('click', function () {
        $("aside.active")
            .addClass("collapse")
            .removeClass("active");
        
        $('aside.float-start').addClass('active');
        $('aside.float-start').removeClass('collapse');
    });

});