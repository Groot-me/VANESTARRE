<?php


class Emoji extends Model
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

    public function clickEmoji($emojiName, $idArticle, $idUser)
    {

      $bdd = self::getBdd();

      $req = $bdd->prepare('SELECT * FROM emoji WHERE id_article = ? and id_user = ?');
      $res = $req->execute(array($idArticle, $idUser));

      $relation = $req->fetch();

      $req = $bdd->prepare('DELETE FROM emoji WHERE id_article = ? and id_user = ?');
      $res = $req->execute(array($idArticle, $idUser));

      if($relation && $relation['emoji_name'] == $emojiName) {

          return;
      }

      else {

          $req = $bdd->prepare('INSERT INTO emoji (id_article, id_user, emoji_name) VALUE (?, ?, ?)');
          $res = $req->execute(array($idArticle, $idUser, $emojiName));
          return;

      }

        $req = $bdd->prepare('INSERT INTO emoji (id_article, id_user, emoji_name) VALUE (?, ?, ?)');
        $res = $req->execute(array($idArticle, $idUser, $emojiName));

    }

        public function getNbrEmoji($id_article, $emoji_name) {

          $bdd = self::getBdd();

          $requete = 'SELECT COUNT(*) FROM emoji WHERE id_article = ? AND emoji_name = ?';

          $req = $bdd->prepare($requete);
          $req->execute(array($id_article, $emoji_name));

          return $req->fetch()[0];

        }

}
