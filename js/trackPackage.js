$(document).ready(function () {
    if($("#openModal").attr("value")){
        console.log("ciao");
        $('#ReviewModal').modal('show');
    }

});

function updateStar(numeroStella, codiceDisco){
    for(let i = 1; i <= numeroStella; i++){
        document.getElementById(`btnStar${i}#${codiceDisco}`).innerHTML = "★";
    }
    for(let i = numeroStella + 1; i <= 5; i++){
        document.getElementById(`btnStar${i}#${codiceDisco}`).innerHTML = "☆";
    }
}