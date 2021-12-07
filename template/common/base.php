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
                <button class="btn btn-default">
                    <img src="../../img/icon/bell.png" alt=""/>
                </button>
            </div>
            <div class="col-2 text-start">
                <?php 
                    if($templateParams["isAdmin"][0]["isAdmin"]){
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
                    <h3 class="mx-4">Carrello</h3>
                </div>
            </header>

            <ul class="list-group list-group-flush border-bottom scrollarea">
                <?php foreach($templateParams["disksInCart"] as $diskInCart): ?>
                    <li class="list-group-item row m-0">
                        <div class="align-top row">
                            <div class="col-4">
                                <img class="rounded d-block" src="<?php echo UPLOAD_DIR.$diskInCart["Copertina"] ;?>" alt=""/>
                            </div>
                            <div class="col-8">
                                <p class="fw-bold mb-0"><?php echo $diskInCart["Titolo"]?></p>
                                <p class=""><?php echo $diskInCart["Artista"]?></p>
                                <div class="mt-2 row mx-0 py-0">
                                    <div class="col-2 px-0 text-end">
                                        <button class="btn btn-default mx-0">
                                            <img src="../../img/icon/minus2.png" class="icon-cart" alt=""/>
                                        </button> 
                                    </div>
                                    <div class="col-1 px-0 text-center">
                                        <p class="pt-1"><?php echo $diskInCart["Quantita"]?></p>
                                    </div>
                                    <div class="col-2 px-0 text-start">
                                        <button class="btn btn-default mx-0">
                                            <img src="../../img/icon/plus2.png" class="icon-cart" alt=""/> 
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
                            <a class="btn btn-primary btn-sm" href="#" role="button">Paga</a>
                        </div>
                    </div>
                </div>
            </footer>
        </aside>

        <!--menu-->
        <aside class="float-start collapse">
            <header class="py-3 px-2">
                <button class="btn btn-default float-end">
                    <img class="float-end" src="../../img/icon/close.png" alt=""/>
                </button>
                <button class="btn btn-default mt-3 mx-4">
                    <img src="../../img/icon/User.png" alt=""/>
                </button>
            </header>

            <div class="px-2">
                <p>Ciao, <?php echo $templateParams["userInfo"][0]["Nome"]?> <?php echo $templateParams["userInfo"][0]["Cognome"]?></p>
            </div>

            <ul class="nav flex-column text-center">
                <li class="nav-item py-2">
                    <a href="../../php/common/profile.php">Profilo</a>
                </li>
                <li class="nav-item py-2">
                    <a href="#">Notifiche</a>
                </li>
                <li class="nav-item py-2">
                    <a href="../../php/common/login.php">Login</a>
                </li>
            
                <li class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"  style="background-color:#ebebeb;">
                                Categorie
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <a href="#">Musica Classica</a>
                                <a href="#">Rap</a>
                                <a href="#">Rock</a>
                                <a href="#">Indie</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </aside>
    </div>
</body>