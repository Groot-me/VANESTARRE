<?php // DECONEXION
$auth = 0;
include 'lib/includes.php';
$_SESSION = array();
header('Location:' . WEBROOT . 'Accueil.php');
die();