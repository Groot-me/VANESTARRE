<?php


class ControleurEmoji
{
    /**
     * @author Jimenez Nathan
     * @version 1.0
     *
     * @example fait le lien entre ajax et le modele
     */
    public function ClickEmojiAction()
    {
        $new_emoji = new Emoji();

        if(isset($_GET['emoji'], $_GET['id']))
        {
            //test sécurité

            $new_emoji->ClickOnEmoji($_GET['emoji'],$_GET['id']);
        }

    }
}

