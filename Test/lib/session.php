<?php // MESSAGE CONNEXION REUSSIE

function flash(){
    $message = 'Vous êtes bien connecté';
    $type = 'succes';
    if(isset($_SESSION['Flash'])){
        extract($_SESSION['Flash']);
        unset($_SESSION['Flash']);
        return "<div class = 'alert alert-$type'>$message</div>";

    }//flash()

}
function setFlash($message, $type = 'success'){
    $_SESSION['Flash']['message'] = $message;
    $_SESSION['Flash']['type']    = $type;

}//setFlach