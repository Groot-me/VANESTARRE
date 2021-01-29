<?php

class Article extends Model
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


    public function create($tag, $message, $url) {
        //Faire les controles nécessaires voir avec les pros de la sécurité

        $bdd = $this->getBdd();

        $req = $bdd->prepare('INSERT INTO article (tag, message, img_source, nb_don) VALUE (?, ?, ?, 0)');
        $req->execute(array($tag, $message, $url));

        }


    public function delete($id) {
      $bdd = $this->getBdd();

      $req = $bdd->prepare('DELETE FROM article WHERE id = ?');
      $req->execute(array($id));
    }


    /**
     * @author Jimenez Nathan
     * @version 1.0
     *
     * @return array elle retourne une liste de parametres definissant un article
     */

    public function get() {

          $bdd = self::getBdd();

          $requete = 'SELECT * FROM article ORDER BY id DESC';
          $req = $bdd->prepare($requete);
          $req->execute();

          return $req->fetchAll();

    }


    public function getByTag($tag) {

          $bdd = self::getBdd();

          $req = $bdd->prepare("SELECT * FROM article WHERE tag LIKE '%$tag%' ORDER BY id DESC");
          $req->execute(array());


          return $req->fetchAll();

    }


}
