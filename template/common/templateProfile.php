<!---->
<script src="../../js/profile.js"></script>
<div class="row text-center m-5">
    <div class="col-3">
        <h1>
            <spam class="border-bottom border-danger">    
                Profilo
            </spam>
        </h1>
    </div>
</div>
<div class="row text-center m-5">
    <div class="col-4"></div>
    <div class="col-4 text-center ">
        <img class="rounded-circle" style="max-width: 100px;" src="../../img/icon/User.png" alt=""/>
    </div>
    <div class="col-1">
        <button class="btn btn-default">
            <img src="../../img/icon/pencil.png" style="max-width: 20px; max-height: 20px;"  alt=""/>
        </button>           
    </div>
    <div class="col-3"></div>

</div>

<div class="row text-center m-5">
    <div class="col-4"></div>
    <div class="col-4">
        <h5><?php echo $_SESSION["nome"] ?> <?php echo $_SESSION["cognome"] ?></h5>
    </div>
    <div class="col-4"></div>
</div>
<div class="row text-center m-5">
    <div class="col-1"></div>
    <div class="col-4 text-end ">
        <p>EMAIL:</p>
    </div>
    <div class="col-3">
        <input tag="text" value="<?php echo $_SESSION["mail"] ?>" readonly/>
    </div>
    <div class="col-5"></div>
</div>
<div class="row text-center m-5">
    <div class="col-1"></div>
    <div class="col-4 text-end ">
        <p>PASSWORD:</p>
    </div>
    <div class="col-3">
        <input tag="text" value="********" readonly/>
    </div>
    <div class="col-5"></div>
</div>
<div class="row text-center m-5">
    <div class="col-1"></div>
    <div class="col-4 text-end ">
        <p>CELLULARE:</p>
    </div>
    <div class="col-3">
        <input tag="text" value="<?php echo $_SESSION["cellulare"] ?>" readonly/>
    </div>
    <div class="col-5"></div>
</div>