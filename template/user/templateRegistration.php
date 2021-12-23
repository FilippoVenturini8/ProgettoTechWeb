<script src="../../js/register.js"></script>
<form class="mt-4" action="#" method="POST">
    <h1>
        <span class="mx-4 border-bottom border-danger border-2 py-1">    
            Registrazione
        </span>
    </h1>

    <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col-6 text-center">
            <img id="profileImage" name="profileImage" class="rounded-circle" style="max-width: 100px;" src="../../img/icon/User.png" alt=""/>
        </div>
        <div class="col-3"></div>
    </div>

    <ul class="text-center list-unstyled">
        <li class="mt-5 ">
            <label class="fw-bold d-block" for="email">Email </label>
            <input type="text" id="email" name="email" />
        </li>
        <li class="mt-3 ">
            <label class="fw-bold d-block" for="nome">Nome </label>
            <input type="text" id="nome" name="nome" />
        </li>
        <li class="mt-3 ">
            <label class="fw-bold d-block" for="cognome">Cognome </label>
            <input type="text" id="cognome" name="cognome" />
        </li>
        <li class="mt-3 ">
            <label class="fw-bold d-block" for="cellulare">Cellulare </label>
            <input type="tel" id="cellulare" name="cellulare" />
        </li>
        <li class="mt-3 ">
            <label class="fw-bold d-block" for="password">Password </label>
            <input type="password" id="password" name="password" />
        </li>
        <li class="mt-3 ">
            <label class="fw-bold d-block" for="confermapassword">Conferma Password </label>
            <input type="password" id="confermapassword" name="confermapassword" />
        </li>
        
        <li class="mt-3 ">
            <div class="row mt-5">
                <div class="col-2"></div>
                <div class="col-8">
                    <input id="changeImg" name="changeImg" class="form-control" type="file" accept=".jpg,.jpeg,.png"/>
                </div>
                <div class="col-2"></div>
            </div>
        </li>

        <li class="mt-4 ">
            <input class="btn btn-primary" type="submit" name="submit" value="Registrati" />
        </li>
    </ul>
    <?php if(isset($templateParams["erroreRegistrazione"])):?>
        <div class="text-center">
            <p><?php echo $templateParams["erroreRegistrazione"]?></p>
        </div>
    <?php endif;?>
</form>
<div class="text-center mt-3">
    <p>Sei già registrato? effettua il <a class="fw-bold text-danger" href="../../php/common/login.php">login</a>!</p>
</div>