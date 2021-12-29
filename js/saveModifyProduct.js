function saveDisks(id){

    var art = $("#txtArtista"+id).val();
    var tit = $("#txtTitolo"+id).val();
    var prz = $("#txtPrezzo"+id).val();
    var qta = $("#txtQta"+id).val();
    //console.log(prz);
    if(!$.isNumeric(prz) || !$.isNumeric(qta) || parseFloat(prz) <0 ||  parseInt(qta)<0 || Math.floor(qta) != qta){
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