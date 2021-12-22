<form class="mt-4" action="#" method="POST">
    <h1>
        <span class="mx-4 border-bottom border-danger border-2">    
            Login
        </span>
    </h1>
    <ul class="text-center list-unstyled">
        <li class="mt-5 ">
            <label class="fw-bold d-block" for="email">EMAIL </label><input type="text" id="email" name="email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>"/>
        </li>
        <li class="mt-5 ">
            <label class="fw-bold d-block" for="password">PASSWORD </label>
            <input type="password" id="password" name="password" />
        </li>
        <li class="mt-5 ">
            <input class="btn btn-primary" type="submit" name="submit" value="Accedi" />
        </li>
    </ul>
    <?php if(isset($templateParams["errorelogin"])):?>
        <div class="text-center">
            <p><?php echo $templateParams["errorelogin"]?></p>
        </div>
    <?php endif;?>
</form>
<div class="text-center mt-3">
    <p>Non hai un account? <a class="fw-bold text-danger" href="../../php/user/registration.php">Registrati</a>!</p>
</div>