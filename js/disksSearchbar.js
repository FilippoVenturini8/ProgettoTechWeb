function searchDisk(){
    $.ajax({
        url:"../../php/api/searchDisk.php",    //the page containing php script
        type: "post",    //request type,
        data: {pattern: $("#disk-searchbar").val()},
        error: function (xhr, status) {
            console.log(status);
        },
        success: function(data) {
            console.log(data);
            data = JSON.parse(data);
            //console.log(data);
            document.getElementById("disk-group").innerHTML = "";
            data.forEach(disk => {

                let valutazione = "";
                if(disk.hasOwnProperty('Voto')){
                    valutazione = disk.Stelle + " (" + disk.Voto + ")";
                }

                let button =`<button id="add<?php echo $disk["Codice"]?>" class="btn btn-default mx-0 add-to-cart-button text-end" onclick="addDiskToCart(<?php echo $disk['Codice']?>)">
                                <img src="../../img/icon/plus2.png" alt=""/> 
                             </button>`;

                


                document.getElementById("disk-group").innerHTML = document.getElementById("disk-group").innerHTML +`
                <div class="row p-2 border-bottom border-danger">
                    <div class="col-4 mt-2">
                        <img src="../../img/` + disk.Copertina + `" alt="" class="diskInOrder"></img>
                    </div>
                    <div class="col-7 mt-2">
                        <div class="row">
                            <p class="m-0">` + disk.Artista + ` - ` + disk.Titolo + `</p>
                            <p class="m-0">
                            ` + valutazione + `
                            </p>
                            <p>` + disk.Prezzo + `€</p>
                        </div>
                        <div class="row mx-0">
                            <div class="col-10 px-0"></div>
                            <div class="col-2 px-0">
                                <?php if(isUserLoggedIn() && count($templateParams["disksInCartCodes"]) != 0 && 
                                        in_array($disk["Codice"], array_keys($templateParams["disksInCartCodes"]))):?>
                                    <button id="remove<?php echo $disk["Codice"]?>" class="btn btn-default mx-0 add-to-cart-button text-end" onclick="removeFromCart(<?php echo $disk['Codice']?>)">
                                        <img src="../../img/icon/minus2.png" alt=""/> 
                                    </button>
                                <?php else:?>
                                    <button id="add<?php echo $disk["Codice"]?>" class="btn btn-default mx-0 add-to-cart-button text-end" onclick="addDiskToCart(<?php echo $disk['Codice']?>)">
                                        <img src="../../img/icon/plus2.png" alt=""/> 
                                    </button>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>`
            });
            if(data.length == 0){
                document.getElementById("diskAccordion").innerHTML = "<p>Nessun disco corrispondente alla ricerca</p>";
            }
        }
    });
}