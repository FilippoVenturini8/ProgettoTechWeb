<!--<h1 class="text-center pt-5">Login</h1>

<h6 class="text-center mt-5">EMAIL</h6>
<div class="text-center">
    <input type="text"/>
</div>
<h6 class="text-center mt-4">PASSWORD</h6>
<div class="text-center">
    <input type="password"/>
</div>

<div class="text-center mt-5">
    <input class="btn btn-primary" type="button" value="Accedi"/>
</div>

<div class="text-center mt-3">
    <a class="fw-bold text-danger" href="../../php/user/register.php">Registrati</a>
</div>-->

<form class="mt-4" action="#" method="POST">
    <h1>
        <spam class="mx-4 border-bottom border-danger">    
            Login
        </spam>
    </h1>
    <ul class="text-center list-unstyled">
        <li class="mt-5 ">
            <label class="fw-bold d-block" for="email">EMAIL </label><input type="text" id="email" name="email" />
        </li>
        <li class="mt-5 ">
            <label class="fw-bold d-block" for="password">PASSWORD </label>
            <input type="password" id="password" name="password" />
        </li>
        <li class="mt-5 ">
            <input class="btn btn-primary" type="submit" name="submit" value="Accedi" />
        </li>
    </ul>
</form>
<div class="text-center mt-3">
    <a class="fw-bold text-danger" href="../../php/user/register.php">Registrati</a>
</div>