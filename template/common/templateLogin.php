<h1 class="mt-4 mx-4">
    <span class="border-bottom border-danger border-2 py-1">    
        Login
    </span>
</h1>
<form class="mt-4" action="#" method="POST">
    <ul class="text-center list-unstyled">
        <li class="mt-5 pt-5">
            <label class="fw-bold d-block" for="email">EMAIL </label><input type="text" id="email" name="email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>"/>
        </li>
        <li class="mt-5">
            <label class="fw-bold d-block" for="password">PASSWORD </label>
            <input type="password" id="password" name="password" />
        </li>
        <li class="mt-5">
            <input class="btn btn-primary" type="submit" name="submit" value="Accedi" />
        </li>
    </ul>
    <?php if(isset($templateParams["errorelogin"])):?>
        <div class="text-center">
            <p><?php echo $templateParams["errorelogin"]?></p>
        </div>
    <?php endif;?>
</form>
<div class="text-center mt-5 pt-4">
    <p>Non hai un account? <a class="fw-bold text-danger" href="../../php/user/registration.php">Registrati</a>!</p>
</div>