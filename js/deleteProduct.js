$(document).ready(function () {
    $("#btnSi").on('click', function () {
        var val = $("#dataid").val();
        console.log(val);
        //richiamare query per eliminare l'lelemento selezionato
        $.ajax({
            url:"../../php/api/confirmationMessage.php",
            type: "post",
            data: {codiceDisco: val},
            error: function (xhr, status) {
                console.log("errore");
                console.log(status);
            },
            success: function(data) {
                console.log("ok");
                console.log(data);
                window.location.href = '../admin/productsList.php';
                //data = JSON.parse(data); 
                
            }
        });
       
    });
});
