$(document).ready(function () {
    $(".dropdown-menu li a").click(function(){
        $(".dropDown").text($(this).text());
        $(".dropDown").val($(this).text());
    });
});

