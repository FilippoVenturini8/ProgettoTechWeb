<form class="mt-4" action="#" method="POST">
    <h1>
        <spam class="mx-4 border-bottom border-danger">    
            Registrazione
        </spam>
    </h1>
    <ul class="text-center list-unstyled">
        <li class="mt-5 ">
            <label class="fw-bold d-block" for="email">EMAIL </label>
            <input type="text" id="email" name="email" />
        </li>
        <li class="mt-3 ">
            <label class="fw-bold d-block" for="nome">NOME </label>
            <input type="text" id="nome" name="nome" />
        </li>
        <li class="mt-3 ">
            <label class="fw-bold d-block" for="cognome">COGNOME </label>
            <input type="text" id="cognome" name="cognome" />
        </li>
        <li class="mt-3 ">
            <label class="fw-bold d-block" for="cellulare">CELLULARE </label>
            <input type="tel" id="cellulare" name="cellulare" />
        </li>
        <li class="mt-3 ">
            <label class="fw-bold d-block" for="password">PASSWORD </label>
            <input type="password" id="password" name="password" />
        </li>
        <li class="mt-3 ">
            <label class="fw-bold d-block" for="confermapassword">CONFERMA PASSWORD </label>
            <input type="password" id="confermapassword" name="confermapassword" />
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