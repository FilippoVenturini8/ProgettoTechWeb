<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["title"]?></title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../js/base.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  

    <!--<script src="../../js/trackPackage.js" type="text/javascript"></script>-->
    <script src="../../js/productListSearchBar.js" type="text/javascript"></script>

    <script src="../../js/cartManage.js" type="text/javascript"></script>

</head>
<body>
    <div class="container-fluid p-0">
        <header class="row text-center">
            <div class="col-2">
                <button class="btn btn-default">
                    <img src="../../img/icon/openMenuIcon.png" alt=""/>
                </button>
            </div>
            <div class="col-2"></div>
            <div class="col-4">
                <a href="../../php/common/index.php">
                    <img src="../../img/icon/logo.png" alt=""/>
                </a>
            </div>
            <div class="col-2 text-end">
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#exampleModal">
                    <img src="../../img/icon/bell.png" alt=""/>
                </button>
            </div>
            <div class="col-2 text-start">
                <?php 
                    if(isUserLoggedIn() && $_SESSION["isadmin"]){
                        require("../../template/admin/templateHeaderAdmin.php");
                    } else {
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
                        <spam class="mx-4 border-bottom border-danger">
                            Carrello
                        </spam>
                    </h3>
                </div>
            </header>

            <?php if(isUserLoggedIn()):?>
                <ul class="list-group list-group-flush scrollarea">
                    <?php foreach($templateParams["disksInCart"] as $diskInCart): ?>
                        <li class="list-group-item row m-0 border-bottom ">
                            <div class="align-top row">
                                <div class="col-4">
                                    <img class="rounded d-block" src="<?php echo UPLOAD_DIR.$diskInCart["Copertina"] ;?>" alt=""/>
                                </div>
                                <div class="col-8">
                                    <p class="fw-bold mb-0"><?php echo $diskInCart["Titolo"]?></p>
                                    <p class=""><?php echo $diskInCart["Artista"]?></p>
                                    <div class="mt-2 row mx-0 py-0">
                                        <div class="col-2 px-0 text-end">
                                            <button class="btn btn-default mx-0 cart-minus" onclick="alterQuantity(<?php echo $diskInCart['CodiceDisco']?>, 'd')">
                                                <img src="../../img/icon/minus2.png" alt=""/>
                                            </button> 
                                        </div>
                                        <div class="col-1 px-0 text-center">
                                            <p class="pt-1"><?php echo $diskInCart["Quantita"]?></p>
                                        </div>
                                        <div class="col-2 px-0 text-start">
                                            <button class="btn btn-default mx-0 cart-plus" onclick="alterQuantity(<?php echo $diskInCart['CodiceDisco']?>, 'i')">
                                                <img src="../../img/icon/plus2.png" alt=""/> 
                                            </button> 
                                        </div>
                                        <div class="col-5"></div>
                                        <div class="col-2">
                                            <p class="pt-1"><?php echo ($diskInCart["Prezzo"]*$diskInCart["Quantita"])?>€</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            

                <footer class="mt-3">
                    <div class="row"></div>
                        <div class="row mx-3">
                            <p class="fw-bold">Totale: <?php echo round($templateParams["cartTotal"][0]["Totale"], 2);?>€</p>
                        </div>
                        <div class="row">
                            <div class="col-9"></div>
                            <div class="col-3">
                                <a class="btn btn-primary btn-sm" href="../../php/user/payment.php" role="button">Paga</a>
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
                        <img src="../../img/icon/User.png" alt=""/>
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
                    <?php if($_SESSION["isadmin"]):?>
                        <li class="nav-item py-2">
                            <a href="../../php/admin/addProduct.php" class="text-dark">Aggiungi Prodotto</a>
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
                    <a href="../../php/common/notify.php" class="text-dark">Notifiche</a>

                    </li>
                    <li class="nav-item py-2">
                        <a href="../../php/common/logout.php" class="text-danger">Logout</a>
                    </li>
                </ul>
            <?php endif;?>
        </aside>

    <!--notifiche-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">
                        <spam class="border-bottom border-danger">
                            Notifiche
                        </spam>
                    </h1>
                    <button class="btn btn-default" data-dismiss="modal">
                        <img src="../../img/icon/close.png" alt=""/>
                    </button>
                </div>
                <?php if(isUserLoggedIn()): ?>
                    <div class="modal-body">
                        <ul class="list-unstyled">
                            <?php foreach($templateParams["messages"] as $message):?>
                                <li class="border-bottom">
                                    <header>
                                        <h2><?php echo $message["Titolo"]?></h2>
                                    </header>
                                    <p><?php echo $message["Testo"]?></p>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</body>