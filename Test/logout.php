<?php // DECONEXION
$auth = 0;
include 'lib/includes.php';
$_SESSION = array();
header('Location:' .'Accueil.php');
die();