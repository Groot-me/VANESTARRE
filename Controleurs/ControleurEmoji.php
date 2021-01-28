<?php


class ControleurEmoji
{
    /**
     * @author Jimenez Nathan
     * @version 1.0
     *
     * @example fait le lien entre ajax et le modele
     */
    public function clickAction()
    {
        $emoji = new Emoji();

        session_start();

        if(isset($_GET['emoji']) && isset($_GET['id']) && isset($_SESSION['id'])) { //test sécurité

            $emoji->clickEmoji($_GET['emoji'], $_GET['id'], $_SESSION['id']);


        }

        header('Location: index.php?ctrl=flux#'.$_GET['id']);

    }
}
