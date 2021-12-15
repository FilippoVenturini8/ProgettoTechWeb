$(document).ready(function () {
    //getOrderState($orderDate, $shipmentDate, $DeliveryDate)
    if($("main > div > div > div:nth-of-type(1) > p").hasClass('text-danger')){
        $("main > div > div > div").style.width = '10%';
    }
    
});