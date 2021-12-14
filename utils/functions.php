<?php
function isUserLoggedIn(){
    return !empty($_SESSION['mail']);
}

//TODO isadmin va lasciato in session? è sicuro??
function registerLoggedUser($user){
    $_SESSION["mail"] = $user["mail"];
    $_SESSION["nome"] = $user["nome"];
    $_SESSION["cognome"] = $user["cognome"];
    $_SESSION["cellulare"] = $user["cellulare"];
    $_SESSION["immagineprofilo"] = $user["immagineprofilo"];
    $_SESSION["isadmin"] = $user["isadmin"];
}

function logout(){
    unset($_SESSION['mail']);
    unset($_SESSION['nome']);
    unset($_SESSION['cognome']);
    unset($_SESSION['cellulare']);
    unset($_SESSION['immagineprofilo']);
    unset($_SESSION['isadmin']);
}

function isMailValid($mail){
    return filter_var($mail, FILTER_VALIDATE_EMAIL);
}

function isPhoneValid($phone){
    return preg_match("/^[0-9]{10}$/", $phone);
}

function getVoteStars($vote){
    $stars = "";
    $tmpVote = $vote;
    while($tmpVote > 0){
        $stars = $stars.'★';
        $tmpVote--;
    }
    for($i = $vote; $i < 5; $i++){
        $stars = $stars.'☆';
    }
    return $stars;
}

?>
