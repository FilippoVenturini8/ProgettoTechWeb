$(document).ready(function () {

    //close cart
    $('aside.float-end > header button').on('click', function () {
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
    $('aside.float-start > header > div:first-of-type button').on('click', function () {
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

    //open notifics
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })


    $('body > div > header > div:first-of-type > button').on('click', function () {
        $("aside.active")
            .addClass("collapse")
            .removeClass("active");
        
        $('aside.float-start').addClass('active');
        $('aside.float-start').removeClass('collapse');
    });

    
    $( window ).resize(function() {
        //footer
        var docHeight = $(window).height();
        var footerHeight = $("body > div > footer").height();
        var footerTop = $("body > div > footer").position().top + footerHeight;

        if(footerTop < docHeight){
            console.log(docHeight - footerTop);
            $("body > div > footer").css("margin-top", 16 + (docHeight - footerTop) + "px");
        } else {
            $("body > div > footer").css("margin-top", 100 + "px");
        }
    });
    
    //footer
    var docHeight = $(window).height();
    var footerHeight = $("body > div > footer").height();
    var footerTop = $("body > div > footer").position().top + footerHeight;

    if(footerTop < docHeight){
        console.log(docHeight - footerTop);
        $("body > div > footer").css("margin-top", 16 + (docHeight - footerTop) + "px");
    } else {
        $("body > div > footer").css("margin-top", 100 + "px");
    }



});