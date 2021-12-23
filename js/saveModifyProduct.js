function saveDisks(){

    var art = $("#txtArtista").val();
    var tit = $("#txtTitolo").val();
    var prz = $("#txtPrezzo").val();
    var qta = $("#txtQta").val();
    var id = $("#txtIdDisk").val();

    if(!$.isNumeric(prz) || !$.isNumeric(qta)){
        console.log("Errore");
        return;
    }
    $.ajax({
        url:"../../php/api/modifyProduct.php",
        type: "post",    //request type,
        data: {Codice:id , Artista: art, Titolo: tit, QuantitaDisponibile:qta, Prezzo: prz},
        
        error: function (xhr, status) {
            console.log(status);
        },
        success: function(data) {
           window.location.href = '../admin/productsList.php';

        }
    });

};