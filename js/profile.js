$(document).ready(function () {
    $("main button").on("click", function(){
        if($("main input")[0].hasAttribute("readonly")){
            $("main button > img").attr("src", "../../img/icon/save.png")
            $("main input").removeAttr("readonly");
        }
        else{
            $("main button > img").attr("src", "../../img/icon/pencil.png")
            $("main input").attr("readonly", true);

            //TODO modifica dati account da javascript
            $.ajax({
                type: "POST",
                url: '../../db/database.php',
                data: {functionname: 'modifyAccount', arguments: [$("main ul > li:nth-of-type(1) input").val(), $("main ul > li:nth-of-type(2) input").val(),
                $("main ul > li:nth-of-type(3) input").val()]}
            });

           $.ajax({
                url: '../../db/database.php',
                dataType: 'json',
                success: function(data){
                    //data returned from php
                }
            });
        }
    });
});