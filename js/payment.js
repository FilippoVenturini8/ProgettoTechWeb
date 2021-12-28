$(document).ready(function () {
    const numeroCarta = $("input#numerocarta");
    const dataScadenza = $("input#datascadenza");
    const cvv = $("#cvv");
    const today = new Date();
    const todayMonth = today.getMonth()+1;
    const todayYear = String(today.getFullYear()).slice(-2);

    $("form .btn").click(function(e){
        e.preventDefault();

        let isFormOk = true;

        const mese = dataScadenza.val().split("-")[0];
        const anno = dataScadenza.val().split("-")[1];
        
        $("input#numerocarta + p").remove();
        if(numeroCarta.val()==undefined || numeroCarta.val().length!=16){
            numeroCarta.parent().append("<p>Il numero della carta deve essere di 16 caratteri.</p>")
            isFormOk = false;
        }

        $("input#datascadenza + p").remove();
        if(dataScadenza.val()==undefined){
            dataScadenza.parent().append("<p>Inserire la data di scadenza.</p>")
            isFormOk = false;
        }

        if(mese.length != 2 || anno.length != 2){
            $("input#datascadenza + p").remove();
            dataScadenza.parent().append("<p>Inserire la data nel formato MM-YY.</p>")
            isFormOk = false;
        }

        if(anno < todayYear || (anno == todayYear && mese < todayMonth)){
            $("input#datascadenza + p").remove();
            dataScadenza.parent().append("<p>Data di scadenza non valida</p>")
            isFormOk = false;
        }

        if(mese <= 0 || mese > 12){
            $("input#datascadenza + p").remove();
            dataScadenza.parent().append("<p>Il mese deve essere compreso tra 1 e 12.</p>")
            isFormOk = false;
        }

        if(anno <= 0){
            $("input#datascadenza + p").remove();
            dataScadenza.parent().append("<p>L'anno deve essere valido</p>")
            isFormOk = false;
        }

        $("input#cvv + p").remove();
        if(cvv.val()==undefined || cvv.val().length!=3){
            cvv.parent().append("<p>Il CVV deve essere di 3 caratteri.</p>")
            isFormOk = false;
        }

        if(isFormOk){
            $("#modalPayment").modal('toggle');
        }

    });
});