/*$(document).ready(function (event) {
    $("div > div > div > nav > div:nth-of-type(2) > button").on("click", function(){
        $valore=$("div > div > div > nav > div:nth-of-type(1) > input").val()
        console.log($valore);
        $.ajax({
            type: "POST",
            url: '../../db/database.php',
            data: {functionname: 'getDisk', arguments: [$valore]}
 
        });
    })
});*/

function search(){
    $.ajax({
        url:"../../php/api/searchDisk.php",    //the page containing php script
        type: "post",    //request type,
        data: {pattern: $(".disk-searchbar").val()},
        error: function (xhr, status) {
            console.log(status);
        },
        success: function(data) {
            $("main").html(data);
        }
    });
}