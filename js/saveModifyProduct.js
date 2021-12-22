function saveDisks(){

    var art = $("#txtArtista").val();
    var tit = $("#txtTitolo").val();
    var prz = $("#txtPrezzo").val();
    //var qta = $("#txtQta").val();
    var id =$("#idDisk").val();
    
    console.log(id);
    $.ajax({
        url:"../../php/api/modifyProduct.php",
        type: "post",    //request type,
        data: {Codice:id , Artista: art, Titolo: tit, Prezzo: prz},
        error: function (xhr, status) {
            console.log(status);
        },
        success: function(data) {
           console.log(data);
           data = JSON.parse(data);
        }
    });

};