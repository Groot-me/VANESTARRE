<?php

    $bdd = new PDO('mysql:host=127.0.0.1;dbname=vanestarre;charset=utf8','root','');

    $articles = $bdd->query('SELECT tag FROM articles ORDER BY id DESC ');

    if(isset($_GET['q']) && !empty($_GET['q'])){
        $q = htmlspecialchars($_GET['q']); //sécurisation
        $q_array = explode(' ', $q); //séparateur de mots
        $articles = $bdd->query('SELECT tag FROM articles WHERE tag LIKE "%'.$q.'% " ORDER BY id DESC ');

        if($articles -> rowCount() == 0){

            $articles = $bdd->query('SELECT tag FROM articles WHERE CONCAT(tag,message) AS concatenation 
                                LIKE "%'.$q.'% " ORDER BY id DESC ');
        }

    }


?>

<form id="searchbox" method="get " action="/search " autocomplete="off ">
    <input name="q " type= "text" size= "15" placeholder= "Enter keywords here… " />
    <input type="button" id="button-submit" type= "submit " value="" />
</form>

