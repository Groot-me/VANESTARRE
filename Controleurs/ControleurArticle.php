<?php


class ControleurArticle
{
    /**
     * @author Jimenez Nathan
     * @version 1.0
     *
     * @example appelle CreezArticle()
     */
    public function CreationAction()
    {

        if (isset($_GET['tag'], $_GET['url'], $_GET['message'], $_GET['nbdon'])) {

            //controle

            $tag = $_GET['tag'];
            $url = $_GET['url'];
            $msg = $_GET['message'];
            $nbdon = $_GET['nbdon'];

            $new_article = new article();
            $new_article->CreerArticle($tag,$url,$msg,$nbdon);

        }

    }

    /**
     * @author Jimenez Nathan
     * @version 1.0
     *
     * @example appelle UpdateArticle
     */
    public function UpdateAction()
    {
        if (isset($_GET['tag'], $_GET['url'], $_GET['message'], $_GET['nbdon'])) {

            //controle

            $tag = $_GET['tag'];
            $url = $_GET['url'];
            $msg = $_GET['message'];
            $nbdon = $_GET['nbdon'];

            $new_article = new article();
            $new_article->UpdateArticle($tag,$url,$msg,$nbdon);


        }

    }


    /**
     * @author Jimenez Nathan
     * @version 1.0
     *
     * @example Affiche les articles avec les valeurs retournées par Afficher
     */

    public function defautAction()
    {

        $article = new Article();

        $currentArticle = $article->getById($_GET['id']);

        return $currentArticle;


    }

}
