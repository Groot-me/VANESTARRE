<?php


class Article extends BD
{

    /**
     * @author Jimenez Nathan
     * @version 1.0
     *
     * @param $Tag le tag de l'article
     * @param $Url l'url de l'image
     * @param $Message le message de l'article
     * @param $Nb_Don le nb de don
     */


    public function CreerArticle($Tag,$Url,$Message,$Nb_Don)
    {
        //Faire les controles nécessaires voir avec les pros de la sécurité

        $bdd = $this->getBdd();

        $requete = 'INSERT INTO `articles` (`id`, `tag`, `message`, `img_source`, `emoji_cute`, `emoji_love`, `emoji_style`, `emoji_swag`, `nb_don`) VALUES (?, ?, ?, ?, ? , ?, ?, ?, ?); ';

        $tabarg = array(NULL,$Tag,$Message,$Url,0,0,0,0,$Nb_Don);
        $req = $bdd->prepare($requete);
        if($req->execute($tabarg)) {
            echo 'Article crée';
        }else {

            echo 'Erreur lors de la création d\'article';

        }

    }

    /**
     * @author Jimenez Nathan
     * @version 1.0
     *
     * @return array elle retourne une liste de parametres definissant un article
     */
    public function Afficher()
    {

          $bdd = $this->getBdd();
          $requete = 'SELECT * FROM articles';
          $req = $bdd->prepare($requete);
          $req->execute();

          while($article = $req->fetch(PDO::FETCH_ASSOC))
          {
              $tabarticle = array('id'=>$article['id'],'url'=> $article['img_source'], 'text'=>$article['message'], 'tag' => $article['tag'], 'nb_love'=>$article['emoji_love'],'nb_cute'=>$article['emoji_cute'],'nb_style'=>$article['emoji_style'],'nb_swag' => $article['emoji_swag']);
              return $tabarticle;

          }

    }

}
