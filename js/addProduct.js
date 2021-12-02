$(document).ready(function (event) {
    $("form > div:nth-last-of-type(2) > div > input").on("change", function(event){
        /*$("form > div:last-of-type").html(`
        <img src="${$(this).val()}" alt=""/>
        `);
        console.log($(this).val());*/

        console.log(event.target.files[0]);
    });
});