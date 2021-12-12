$(document).ready(function (event) {
    
    $("main button").on("click", function(){
        if($("main input")[0].hasAttribute("readonly")){
            $("main button > img").attr("src", "../../img/icon/save.png")
            $("main input").removeAttr("readonly");
        }
        else{
            $("main button > img").attr("src", "../../img/icon/pencil.png")
            $("main input").attr("readonly", true);
        }
    });
});