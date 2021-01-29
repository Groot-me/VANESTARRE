<?php


class ControleurArticle {
    /**
     * @author Jimenez Nathan
     * @version 1.0
     *
     * @example appelle CreezArticle()
     */
    public function defautAction() {

      Vue::montrer('article/voir', array());

    }

    public function createAction() {

      $article = new Article();

      $article->create($_POST['tag'], $_POST['message'], $_POST['img']);

      header('Location: ./flux');

    }


    public function deleteAction() {
      session_start();

      if(isset($_SESSION['admin']) && $_SESSION['admin']) {
        $article = new Article();

        $article->delete($_GET['id']);


    }

    header('Location: ./flux');

  }
}
