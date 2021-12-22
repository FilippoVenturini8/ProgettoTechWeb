$(document).ready(function () {
    $("#btnModifica").on('click', function () {
        var val = $(this).attr("data-id");
        var id ="disk" + val;
        /*console.log(val);
        console.log(id);*/

        $.ajax({
            url:"../../php/api/searchDisk.php",    //the page containing php script
            type: "post",    //request type,
            data: {pattern: val},
            error: function (xhr, status) {
                console.log(status);
            },
            success: function(data) {
                //console.log(data);
                data = JSON.parse(data);
                //console.log(data);
                data.forEach(disk => {
                    document.getElementById(id).innerHTML =`
                    <div class="accordion-body" id="modifyAccordion">
                        <div class="d-inline-block align-top">
                            <img src="../../img/`+ disk.Copertina +`" alt="" class="diskInOrder"></img>
                        </div>
                        <div class="d-inline-block align-top">
                            <form>
                            
                                <p class="m-0"><input type="text"  id="txtArtista" value="`+ disk.Artista +`"/> - <input type="text"  id="txtTitolo" value="`+ disk.Titolo +`"/></p>                          
                                <p><input type="text"  id="txtPrezzo" value="`+ disk.Prezzo +`"/>€</p>
                                <p>
                                    <button type="button" class="btn btn-primary" id="btnSalva" data-id="`+ disk.Codice +`"  onclick="saveDisks()">
                                    <input type="hidden"  id="idDisk" value="`+ disk.Codice +`"/>
                                        Salva
                                    
                                    </button>
                                    <button type="button" class="btn btn-primary" id="idElimina" data-id="`+ disk.Codice +`" onclick="cancelChangesProduct()">
                                        Annulla
                                    </button>
                                </p>
                            <form>                         
                        </div>
                    </div>`;
                });

            }
        });
        
    });
    
    
});


/*$id.html(``);
        /*$("#modifyAccordion").html(`
        <div class="d-inline-block align-top">
            <img src="<?php echo UPLOAD_DIR.$disk["Copertina"] ;?>" alt="" class="diskInOrder"></img>
        </div>
        <div class="d-inline-block align-top">
            <p class="m-0"><?php echo $disk["Artista"];?> - <?php echo $disk["Titolo"]?></p>                          
            <p><?php echo $disk["Prezzo"];?>€</p>
            <p>
                <input type="text"  id="dataid" value="ciao"/>
                <button type="button" class="btn btn-primary" id="btnModifica" data-id="<?php echo $disk["Codice"]?>"  onclick="">
                <input type="hidden"  id="idDisk" value="<?php echo $disk["Codice"]?>"/>
                    Modifica
                   
                </button>
                <button type="button" class="btn btn-primary" id="idElimina" data-id="<?php echo $disk["Codice"]?>" onclick="$('#dataid').val($(this).data('id'));" data-toggle="modal" data-target="#exampleModal">
                    Elimina
                </button>
            <p>                         
        </div>`);*/