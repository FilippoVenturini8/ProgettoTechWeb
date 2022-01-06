<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["title"]?></title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../js/base.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
    <script src="../../js/cartManage.js" ></script>
    <script src="../../js/deleteProduct.js"></script>
</head>
<body>
    <div class="container-fluid p-0">
        <header class="row text-center">
            <div class="col-2">
                <button class="btn btn-default">
                    <img src="../../img/icon/openMenuIcon.png" alt="openMenuIcon"/>
                </button>
            </div>
            <div class="col-2"></div>
            <div class="col-4">
                <a href="../../php/common/index.php">
                    <img src="../../img/icon/logo.png" alt="LPShop-logo"/>
                </a>
            </div>
            <div class="col-2 text-end">
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#MessagesModal">
                    <img src="../../img/icon/<?php
                    if(!isset($templateParams["messages"])){
                        echo "bell.png";
                    }else{
                        $newNotify = false;
                        foreach($templateParams["messages"] as $notify){
                            if($notify["Visualizzata"] == 0){
                                $newNotify = true;
                                break;
                            }
                        }
                        if($newNotify){
                            echo "bellNotify.png";
                        }else{
                            echo "bell.png";
                        }
                    }
                    ?>" alt="" />
                </button>
            </div>
            <div class="col-2 text-start">
                <?php 
                    if(isUserLoggedIn() && $_SESSION["isadmin"]){
                        require("../../template/admin/templateHeaderAdmin.php");
                    } else{
                        require("../../template/user/templateHeaderUser.php");
                    }
                ?>
            </div>
        </header>

        <main>
            <?php
                if(isset($templateParams["templateName"])){
                    require($templateParams["templateName"]);
                }
            ?>
        </main>

        <!--carrello-->
        
        <aside class="collapse float-end">
            <header class="row pt-3">
                <div class="row mx-0 px-0">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <button class="btn btn-default">
                            <img src="../../img/icon/close.png" alt=""/>
                        </button>
                    </div>
                </div>
                <div class="row mb-3">
                    <h3>
                        <span class="mx-4 border-bottom border-danger border-2 py-1">
                            Carrello
                        </span>
                    </h3>
                </div>
            </header>

            <?php if(isUserLoggedIn() && !$_SESSION["isadmin"]):?>
                <ul class="list-group list-group-flush scrollarea cart">
                    <?php foreach($templateParams["disksInCart"] as $diskInCart): ?>
                        <li class="list-group-item row m-0 border-bottom " id="diskInCart<?php echo $diskInCart['CodiceDisco']?>">
                            <div class="align-top row">
                                <div class="col-4">
                                    <img class="rounded d-block" src="<?php echo UPLOAD_DIR.$diskInCart["Copertina"] ;?>" alt=""/>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-10">
                                            <p class="fw-bold mb-0"><?php echo $diskInCart["Titolo"]?></p>
                                        </div>
                                        <div class="col-2 text-end">
                                            <button class="btn btn-default cart-delete" onclick="removeFromCart(<?php echo $diskInCart['CodiceDisco']?>)">
                                                <img src="../../img/icon/close.png" alt=""/>
                                            </button> 
                                        </div>
                                    </div>
                                    <p class=""><?php echo $diskInCart["Artista"]?></p>
                                    <div class="mt-2 row mx-0 py-0">
                                        <div class="col-2 px-0 text-end">
                                            <button class="btn btn-default mx-0 cart-minus" onclick="alterQuantity(<?php echo $diskInCart['CodiceDisco']?>, 'd')">
                                                <img src="../../img/icon/minus2.png" alt="minus"/>
                                            </button> 
                                        </div>
                                        <div class="col-1 px-0 text-center">
                                            <p id="cartQt<?php echo $diskInCart['CodiceDisco']?>" class="pt-1"><?php echo $diskInCart["Quantita"]?></p>
                                        </div>
                                        <div class="col-2 px-0 text-start">
                                            <button class="btn btn-default mx-0 cart-plus" onclick="alterQuantity(<?php echo $diskInCart['CodiceDisco']?>, 'i')">
                                                <img src="../../img/icon/plus2.png" alt="plus"/> 
                                            </button> 
                                        </div>
                                        <div class="col-5"></div>
                                        <div class="col-2">
                                            <p id="diskSubTotal<?php echo $diskInCart['CodiceDisco']?>" class="pt-1"><?php echo ($diskInCart["Prezzo"]*$diskInCart["Quantita"])?>€</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                        
                <footer class="mt-3">
                    <div class="row">
                        <div class="row mx-3">
                            <p class="fw-bold" id="cartTotal">Totale: <?php echo round($templateParams["cartTotal"][0]["Totale"], 2);?>€</p>
                        </div>
                        <div class="row">
                            <div class="col-9"></div>
                            <div class="col-3">
                                <a id="btnPaga" class="btn btn-primary btn-sm <?php if(count($templateParams["disksInCart"]) == 0){echo "disabled";}?>" href="../../php/user/payment.php" role="button">Paga</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <?php endif;?>
        </aside>
        
        <!--menu-->
        <aside class="float-start collapse">
            <header class="py-3 px-2">
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <button class="btn btn-default float-end">
                            <img class="float-end" src="../../img/icon/close.png" alt=""/>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6 text-center">
                        <?php if(isset($_SESSION["immagineprofilo"]) && $_SESSION["immagineprofilo"] != NULL):?>
                            <img class="rounded-circle" src="../../img/profileImage/<?php echo($_SESSION["immagineprofilo"])?>" alt=""/>
                        <?php else : ?>
                            <img class="rounded-circle" src="../../img/profileImage/User.png" alt=""/>
                        <?php endif; ?>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row text-center mt-3">
                    <?php if(isUserLoggedIn()):?>
                        <p>Ciao, <?php echo $_SESSION["nome"]?> <?php echo $_SESSION["cognome"]?></p>
                    <?php else:?>
                        <p>Ciao, effettua il <a href="../../php/common/login.php" class="text-primary">Login</a></p>
                    <?php endif;?>
                </div>
            </header>

            
            <?php if(isUserLoggedIn()):?>
                <ul class="nav flex-column text-center">
                    <li class="nav-item py-2">
                        <a href="../../php/common/profile.php" class="text-dark">Profilo</a>
                    </li>
                    <li class="nav-item py-2">
                        <a href="../../php/common/notify.php" class="text-dark">Notifiche</a>
                    </li>
                    <?php if($_SESSION["isadmin"]):?>
                        <li class="nav-item py-2">
                            <a href="../../php/admin/addProduct.php" class="text-dark">Aggiungi Disco</a>
                        </li>
                        <li class="nav-item py-2">
                            <a href="../../php/admin/productsList.php" class="text-dark">Gestisci Prodotti</a>
                        </li>
                        <li class="nav-item py-2">
                            <a href="../../php/admin/ordersList.php" class="text-dark">Gestisci Ordini</a>
                        </li>
                    <?php endif;?>
                    <?php if(!$_SESSION["isadmin"]):?>
                        <li class="nav-item py-2">
                            <a href="../../php/user/orders.php" class="text-dark">I Miei Ordini</a>
                        </li>
                    <?php endif;?>
                    <li class="nav-item py-2">
                        <a href="../../php/common/logout.php" class="text-danger">Logout</a>
                    </li>
                </ul>
            <?php endif;?>
        </aside>

        <!--notifiche-->
        <div class="modal fade" id="MessagesModal" tabindex="-1" role="dialog" aria-labelledby="MessagesModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="MessagesModalLabel">
                            <span class="border-bottom border-danger border-2">
                                Notifiche
                            </span>
                        </h1>
                        <button class="btn btn-default" data-dismiss="modal">
                            <img class="closeIcon" src="../../img/icon/close.png" alt=""/>
                        </button>
                    </div>
                    <?php if(isUserLoggedIn()): ?>
                        <div class="modal-body pt-0">
                            <ul class="list-unstyled">
                                <?php foreach($templateParams["messages"] as $message):?>
                                    <li class="row border-bottom">
                                        <a href="../../php/api/readNotification.php?codiceNotifica=<?php echo $message["Codice"]?>" class="text-decoration-none iconDropdown">
                                            <div class="row">
                                                <div class ="col-11 pt-1">
                                                    <header>
                                                        <h3 class="mb-0"><?php echo $message["Titolo"]?></h3>
                                                    </header>
                                                </div>
                                                <?php if($dbh->isRead($message["Codice"]) == 0):?>
                                                    <div class ="col-1 text-end pt-1">
                                                        <img src="../../img/icon/exclamation-mark.png" alt="" style="width:20px; height:20px;"/>
                                                    </div>
                                                <?php endif;?>
                                            </div>
                                            <div class="row mb-2 fw-light">
                                                <span><?php echo $message["DataNotifica"]?></span>
                                            </div>
                                            <div class="row">
                                                <p><?php echo $message["Testo"]?></p>
                                            </div>
                                        </a>
                                    </li>
                                    
                                <?php endforeach;?>
                            </ul>
                        </div>
                    <?php endif;?>
                    <?php if(!isUserLoggedIn()): ?>
                        <div class="modal-body text-center">
                            <p>Effettua il login per visualizzare le notifiche.</p>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>

        <footer class="row text-white text-center ">
            <div class="col-12">
                <p class="mb-2">LPShop® - all rights reserved</p>
                <ul class="mb-1">
                    <li class="d-inline-block mx-3">+39 333 6835952</li>
                    <li class="d-inline-block mx-3">Via Cesare Pavese, 5047521 Cesena FC</li>
                    <li class="d-inline-block mx-3">lpshop@gmail.com</li>
                </ul>
            </div>
        </footer>
    </div>
</body>
</html>