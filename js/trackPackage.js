$(document).ready(function () {
    if($("#openModal").attr("data-id")){
        $('#ReviewModal').modal('show');
    }

});

function updateStar(numeroStella, codiceDisco){
    for(let i = 1; i <= numeroStella; i++){
        document.getElementById(`btnStar${i}-${codiceDisco}`).innerHTML = "★";
    }
    for(let i = numeroStella + 1; i <= 5; i++){
        document.getElementById(`btnStar${i}-${codiceDisco}`).innerHTML = "☆";
    }
}

function saveReview(codiceDisco, codiceOrdine){
    let vote = 0;
    for(let i = 1; i <= 5; i++){
        if(document.getElementById(`btnStar${i}-${codiceDisco}`).innerHTML == "★"){
            vote++;
            document.getElementById(`btnStar${i}-${codiceDisco}`).classList.add("starSelected");
        }
        document.getElementById(`btnStar${i}-${codiceDisco}`).removeAttribute("onclick");
    }
    if(vote != 0){
        $.ajax({
            url:"../../php/api/addReview.php",
            type: "post",
            data: {codiceDisco: codiceDisco, codiceOrdine: codiceOrdine, voto: vote},
            error: function (xhr, status) {
                console.log("errore");
                console.log(status);
            },
            success: function(data) {
                console.log(data);
                //data = JSON.parse(data);                 
            }
        });
        document.getElementById(`review${codiceDisco}`).classList.add("reviewRemoving");
        setTimeout(function() {
            if(document.getElementById(`review${codiceDisco}`).parentElement.childElementCount == 1){
                $('#ReviewModal').modal('hide');
            }
            document.getElementById(`review${codiceDisco}`).remove();
        }, 700);
    }
}