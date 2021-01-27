<?php


class Emoji extends BD
{

    /**
     * @author Jimenez Nathan
     * @version 1.0
     *
     * @param $emoji
     * @param $id
     *
     * @return retourne un format JSON pour la requete AJAX
     */

    public function ClickOnEmoji($emoji,$id)
    {

        //verifiez encore les 2 paramatres


            $bdd = $this->getBdd();

            $requete = 'SELECT id_user, id_article, nom_emoji FROM emoji_control WHERE id_user = '.$_SESSION['id_user'].' AND id_article = '.$id;
            $req = $bdd->prepare();

            if(!$req->execute())
            {

                //il n'a jamais cliqué sur cette article de sa vie on insere donc son like dans emoji_control et on update un like dans article

                $requete = 'INSERT INTO emoji_control VALUES (?,?,?)';

                $tabarg = array($_SESSION['id_user'],$id,$emoji);
                $req = $bdd->prepare($requete);

                if(!$req->execute($tabarg))
                {

                    echo json_encode( array('error'=>'une erreur c`\'est produite essayez d\'actualiser la page') );

                }else {
                    $requete ='UPDATE articles SET emoji_'.$emoji.' = emoji_'.$emoji.'+1 WHERE `articles`.`id` ='.$id ;
                    $req = $bdd->prepare($requete);
                    $req->execute($req);

                    $return_arr = array('id'=> $id, 'emoji'=>$emoji, 'result'=> 'plus');

                    echo json_encode($return_arr);

                }

                //il a deja liké l'article donc il peut cliquer sur le meme pour enlever le like ou cliquer sur un autre
            }else{

                $requete = 'SELECT id_user, id_article, nom_emoji FROM emoji_control WHERE id_user = '.$_SESSION['id_user'].' AND id_article = '.$id.'AND nom_emoji = '.$emoji;

                $bdd = $this->getBdd();
                $req = $bdd->prepare($requete);


                if(!$req->execute()){

                    //il clique donc sur un autre emoji
                    echo json_encode( array('error'=>'Vous ne pouvez pas mettre plusieurs émoji sur un article') );

                }else{

                    //il clique donc sur le meme emoji
                    $requete ='UPDATE articles SET emoji_'.$emoji.' = emoji_'.$emoji.'-1 WHERE `articles`.`id` ='.$id ;
                    $req = $bdd->prepare($requete);
                    $req->execute($req);

                    $return_arr = array('id'=> $id, 'emoji'=>$emoji, 'result'=> 'moins');

                    echo json_encode($return_arr);
                }

            }

        }

}