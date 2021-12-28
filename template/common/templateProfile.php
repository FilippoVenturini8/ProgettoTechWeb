<!---->
<script src="../../js/profile.js"></script>
<div class="row text-center m-5">
    <div class="col-3">
        <h1>
            <spam class="border-bottom border-danger border-2">    
                Profilo
            </spam>
        </h1>
    </div>
</div>

<form action="../../php/api/processNewProduct.php" method="POST" enctype="multipart/form-data">

    <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col-6 text-center">
            <?php if($_SESSION["immagineprofilo"] != NULL):?>
                <img id="profileImage" class="rounded-circle" style="max-width: 100px;" src= "../../img/icon/<?php echo($_SESSION["immagineprofilo"])?>" alt=""/>
            <?php else : ?>
                <img id="profileImage" class="rounded-circle" style="max-width: 100px;" src="../../img/icon/User.png" alt=""/>
            <?php endif; ?>
        </div>
        <div class="col-3"></div>
    </div>

    <div class="row">
        <div class="col-4"></div>
        <div class="form-group mt-4 col-4 text-center">
            <label><?php echo $_SESSION["nome"] ?> <?php echo $_SESSION["cognome"] ?></label>
        </div>
    </div>

    <div class="row form-group mt-3 mx-5 px-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <label for="mail">EMAIL:</label>
            <input id="mail" name="mail" type="mail" class="form-control" value="<?php echo $_SESSION["mail"] ?>" readonly/>
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="row form-group mt-3 mx-5 px-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <label for="password">PASSWORD:</label>
            <input id="password" name="password" class="form-control" type="text" autocomplete="off" value="*******" readonly/>
        </div>
        <div class="col-md-4"></div>    
    </div>

    <div class="row form-group mt-3 mx-5 px-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <label for="cellulare">CELLULARE:</label>
            <input id="cellulare" name="cellulare" class="form-control" type="text" autocomplete="off" value="<?php echo $_SESSION["cellulare"] ?>" readonly/>
        </div>
        <div class="col-md-4"></div>
    </div>
</form>

