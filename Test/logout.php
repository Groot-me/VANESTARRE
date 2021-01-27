<?php


$id = 5;
$user = 5;
$emoji = 'swag';

$_Bdd = new PDO('mysql:host=localhost;dbname=article;charset=utf8','root','');
$_Bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$requete = 'INSERT INTO emoji_control VALUES ("'. $user .'", "'. $id .'", "'. $emoji .'")';


$req = $_Bdd->prepare($requete);
$req->execute();


try
{
$req->execute();


} catch (Exception $e){

    echo 'ça marche pas ';
    die();

}

echo ' ça marche';



?>