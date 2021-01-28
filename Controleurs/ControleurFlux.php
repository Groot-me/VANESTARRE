<?php

  final class ControleurFlux {

    public function defautAction() {

      $article = new Article();

      $articles = $article->get();

      $emoji = new Emoji();

      foreach($articles as $nbr => $article) {

        foreach(array('style', 'swag', 'cute', 'love') as $EmojiKey => $emojiName) {

          $emojiNbr = $emoji->getNbrEmoji($article['id'], $emojiName);

          $articles[$nbr]['nbr'][$emojiName] = $emojiNbr;
        }
      }


      Vue::montrer('flux/voir', array('articles' => $articles));

    }

  }

 ?>
