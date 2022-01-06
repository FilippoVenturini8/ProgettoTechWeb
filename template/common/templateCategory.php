<h1 class="p-3 text-center pb-5">
    <span class="border-bottom border-danger border-2 py-1">
        <?php echo $templateParams["categoryName"]?>
    </span>    
</h1>
<!--singolo disco-->
<?php $i=0; foreach($templateParams["disks"] as $disk) :?>
<div class="row">
    <div class="col-lg-3"></div>
    <div id="<?php echo $disk["Codice"]?>" class="col-lg-6 p-2 <?php if($i==0){echo "border-top";}?> border-start border-end border-bottom border-danger <?php if(isset($templateParams["popularClicked"]) && $disk["Codice"] == $templateParams["popularClicked"]){ echo "popularClicked";}else{echo "notClicked";}?>">
        <div class="row px-2">
            <div class="col-4 mt-2">
                <img src="<?php echo UPLOAD_DIR.$disk["Copertina"] ;?>" alt="" class="diskInOrder"/>
            </div>
            <div class="col-8 mt-2">
                <div class="row">
                    <p class="m-0"><?php echo $disk["Titolo"]?> - <?php echo $disk["Artista"];?></p>
                    <p class="m-0 fw-light"><?php echo $disk["DataPubblicazione"]?></p>
                    <p class="m-0">
                        <?php foreach($templateParams["disksVotes"] as $diskVote) :?>
                            <?php if($diskVote["CodiceDisco"] == $disk["Codice"]){
                                echo getVoteStars($diskVote["VotoMedio"])." (".round($diskVote["VotoMedio"], 2).")";   
                            }?>
                        <?php endforeach;?>
                    </p>
                </div>
                <div class="row mx-0 mt-5 py-0">
                    <div class="col-12 px-0 pt-3 text-end">
                        <?php if($disk["QuantitaDisponibile"] > 0): ?>
                            <span class="fw-bold align-middle"><?php echo $disk["Prezzo"];?>€</span>
                            <?php if(isUserLoggedIn() && !$_SESSION["isadmin"]):?>
                                <?php if(count($templateParams["disksInCartCodes"]) != 0 && 
                                        in_array($disk["Codice"], array_keys($templateParams["disksInCartCodes"]))):?>
                                    <button id="remove<?php echo $disk["Codice"]?>" class="btn btn-default mx-0 add-to-cart-button text-end" onclick="removeFromCart(<?php echo $disk['Codice']?>)">
                                        <img src="../../img/icon/minus2.png" alt=""/> 
                                    </button>
                                <?php else:?>
                                    <button id="add<?php echo $disk["Codice"]?>" class="btn btn-default mx-0 add-to-cart-button text-end" onclick="addDiskToCart(<?php echo $disk['Codice']?>)">
                                        <img src="../../img/icon/plus2.png" alt="plus"/> 
                                    </button>
                                <?php endif;?>
                            <?php endif;?>
                        <?php else: ?>
                            <p class="fw-bold">Disco Terminato</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>
<?php $i=$i+1; endforeach; ?>