<?php




$_SESSION['id_user'] = 2;
//la je teste si l'utilisateur à cliqué sur un emoji
$_Bdd = new PDO('mysql:host=localhost;dbname=article;charset=utf8','root','');





if(isset($_GET['emoji'], $_GET['id'])) {

    $emoji = $_GET['emoji'];
    $id = $_GET['id'];

    $requete = 'INSERT INTO emoji_control VALUES ("'. $_SESSION['id_user'] .'", "'. $id .'", "'. $emoji .'")';

    $req = $_Bdd->prepare($requete);
    $req->execute();

    /*

            $requete = 'SELECT id_user, id_article, nom_emoji FROM emoji_control WHERE id_user = '.$_SESSION['id_user'].' AND id_article = '.$id;


            $req = $_Bdd->prepare($requete);


            if(!$req->execute())
            {

                //il n'a jamais cliqué sur cette article de sa vie on insere donc son like dans emoji_control

                $requete = 'INSERT INTO `emoji_control` (`id_user`, `id_article`, `nom_emoji`) VALUES ("'. $_SESSION['id_user'] .'", "'. $id .'", "'. $emoji .'")';

                $req = $_Bdd->prepare($requete);
                $req->execute();

            }else{

                //il a deja liké l'article donc il peut cliquer sur le meme pour enlever le like ou cliquer sur un autre
                $requete = 'SELECT id_user, id_article, nom_emoji FROM emoji_control WHERE id_user = '.$_SESSION['id_user'].' AND id_article = '.$id.'AND nom_emoji = '.$emoji ;
                $req = $_Bdd->prepare($requete);

                if(!$req->execute()){

                    //il clique donc sur un autre emoji
                    $requete = 'UPDATE `articles` SET `nom_emoji` ='.$emoji.'WHERE `emoji_control`.`id_user` ='.$_SESSION['id_user'].'AND `emoji_control`.`id_article` ='.$id;
                    $req = $_Bdd->prepare($requete);
                    $req->execute();


                }else{

                    //il clique donc sur le meme emoji

                    echo ' vous avez deja like cette emoji ';

                }



            }


    */


}
