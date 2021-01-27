<?php


if(isset($_GET['emoji'], $_GET['id'])) {

    $_SESSION['id_user'] =  754;
//la je teste si l'utilisateur à cliqué sur un emoji
    $_Bdd = new PDO('mysql:host=localhost;dbname=article;charset=utf8','root','');

    $emoji = $_GET['emoji'];
    $id = $_GET['id'];

    $requete = 'INSERT INTO emoji_control VALUES (?, ? ,?)';

    $req = $_Bdd->prepare($requete);

    $tab = array($_SESSION['id_user'],$id,$emoji);

    if(!$req->execute($tab))
    {
        echo json_encode( array('error'=>'error') );

    }else {
        $requete ='UPDATE articles SET emoji_'.$emoji.' = emoji_'.$emoji.'+1 WHERE `articles`.`id` ='.$id ;
        $req = $_Bdd->prepare($requete);
        $req->execute($tab);


        $return_arr = array('id'=> $id, 'emoji'=>$emoji, 'result'=> 'plus');

        echo json_encode($return_arr);

    }


}