$(document).ready(function (event) {
    
    $("main button").on("click", function(){
        if($("main input")[0].hasAttribute("readonly")){
            $("main button > img").attr("src", "../../img/icon/save.png")
            $("main input").removeAttr("readonly");
        }
        else{
            $("main button > img").attr("src", "../../img/icon/pencil.png")
            $("main input").attr("readonly", true);

            jQuery.ajax({
                type: "POST",
                url: '../db/database.php',
                dataType: 'json',
                data: {functionname: 'modifyAccount', arguments: [$("text:first-of-type()"), $("text:nth-of-type(2)"),
                $("text:nth-of-type(3)")]},
                /*
                success: function (obj, textstatus) {
                              if( !('error' in obj) ) {
                                  yourVariable = obj.result;
                              }
                              else {
                                  console.log(obj.error);
                              }
                        }
                        */
            });
        }
    });
});