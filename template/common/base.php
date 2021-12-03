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
                <button id="cartExpand" class="btn btn-default">
                    <img src="../../img/icon/cart.png" alt=""/>
                </button>
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
                <div class="col-2"></div>
                <h3 class="col-7">Carrello</h3>
                <button class="btn btn-default col-3">
                    <img src="../../img/icon/close.png" alt=""/>
                </button>
            </header>

            <ul class="list-group list-group-flush border-bottom scrollarea">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-5" >
                            <img class="rounded" src="../../img/LP/rap/salmo.jpg" alt="" style="max-height: 70px;"/>
                        </div>
                        <div class="col-7">
                            <p class="text-end m-0">2x Salmo - Playlist</p>
                            <p class="text-end">19,99€</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4 text-end" >
                            <a class="btn btn-primary btn-sm" href="#" role="button">Rimuovi</a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">Articolo2</li>
                <li class="list-group-item">Articolo3</li>
                <li class="list-group-item">Articolo4</li>
                <li class="list-group-item">Articolo5</li>
            </ul>

            <footer>
                <div class="row"></div>
                    <div class="row"><p>Totale: 39,80€</p></div>
                    <div class="row py-10">
                        <div class="col-6"></div>
                        <div class="col-5 text-end pb-4">
                            <a class="btn btn-primary btn-sm" href="#" role="button">Paga</a>
                        </div>
                        <div class="col-1"></div>
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
                <button class="btn btn-default">
                    <img src="../../img/icon/User.png" alt=""/>
                </button>
            </header>

            <div class="px-2">
                <p>Ciao Utente</p>
            </div>

            <ul class="nav flex-column text-center">
                <li class="nav-item py-2">
                    <a href="../../php/common/profile.php">Profilo</a>
                </li>
                <li class="nav-item py-2">
                    <a href="#">Categorie</a>
                </li>
                <li class="nav-item py-2">
                    <a href="#">Notifiche</a>
                </li>
            </ul>
        </aside>
    </div>
</body>