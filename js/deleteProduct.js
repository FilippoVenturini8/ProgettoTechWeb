$(document).ready(function () {
    $("#btnSi").on('click', function () {
        //richiamare query per eliminare l'lelemento selezionato
        $.ajax({
            url:"../../php/api/removeDisk.php",
            type: "post",
            data: {codiceDisco: $("#dataid").val()},
            error: function (xhr, status) {
                console.log("errore");
                console.log(status);
            },
            success: function(data) {
                //console.log(data);
                window.location.href = '../admin/productsList.php';
                //data = JSON.parse(data); 
                
            }
        });
       
    });
});
