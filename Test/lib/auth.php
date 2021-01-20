<?php //AUTHENTIFICATION
session_start();
if(!isset($auth)){
    var_dump($_SESSION);
    if (!isset($_SESSION['Auth']['id'])) {
        header('Location:' . WEBROOT . 'Accueil.php');
        die();
    }
}
