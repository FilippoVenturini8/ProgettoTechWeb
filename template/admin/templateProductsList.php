<!--LISTINO VINILI-->
<div class="row m-3">
        <div class="col-7">
            <div class="row">
                <nav class="navbar">
                    <div class="col-8">
                        <input class="form-control " type="search" placeholder="Scrivi qui" aria-label="search">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-outline-success " style="border-color:darkred; color:darkred;" type="submit">Cerca</button>
                    </div>
                    <div class="col-1"></div>                  
                </nav>
            </div>
        </div>
        <div class="col-5 mt-2">
            <div class="input-group">
                <label class="input-group-text" for="inputGroupSelect01">Ordina:</label>
                <select class="form-select" id="inputGroupSelect01">
                    <option selected>Predefinito</option>
                    <option value="1">Alfabetico sù</option>
                    <option value="2">Alfabetico giù</option>
                    <option value="3">Prezzo cresente</option>
                    <option value="4">prezzo decrescente</option>
                </select>
                </div>
        </div>
    </div>
    
    <div class="row m-5">
        <div class="col-10">
            <h4>LISTINO VINILI</h4>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="accordion" id="diskAccordion">
        <?php foreach($templateParams["allDisks"] as $disk): ?> 
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $disk["Codice"]?>">
                <button class="accordion-button row mx-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#disk<?php echo $disk["Codice"]?>" aria-controls="disk<?php echo $disk["Codice"]?>">
                    <div class="col-1">
                        <label>#<?php echo $disk["Codice"]?></label>
                    </div>
                    <div class="col-4 ml-2">
                        <label><?php echo $disk["Titolo"]?></label>
                    </div>
                    <div class="col-3">
                        <label><?php echo $disk["Artista"]?></label>
                    </div>
                    <div class="col-2">
                        <label><?php echo $disk["Prezzo"]?>€</label>
                    </div>
                    <div class="col-2">
                        <label>Qtà: <?php echo $disk["QuantitaDisponibile"]?></label>
                    </div>
                </button>
                </h2>
                <div id="disk<?php echo $disk["Codice"]?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $disk["Codice"]?>" data-bs-parent="#diskAccordion">
                    <div class="accordion-body">
                        <div class="d-inline-block align-top">
                            <img src="<?php echo UPLOAD_DIR.$disk["Copertina"] ;?>" alt="" class="diskInOrder"></img>
                        </div>
                        <div class="d-inline-block align-top">
                            <p class="m-0"><?php echo $disk["Artista"];?> - <?php echo $disk["Titolo"]?></p>                          
                            <p><?php echo $disk["Prezzo"];?>€</p>
                            <p><a href="#">modifica</a> <a href="#">elimina</a><p>                         
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<div>