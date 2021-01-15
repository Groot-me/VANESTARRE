<?php


class ControleurInscription
{
    private $identifiants;
    private $email;
    private $password;

    public function InscriptionAction($Identifiant, $email, $password)
    {
        $Is_Inscription = false;

        if ($Is_Inscription) {
            $O_Inscription = new Inscription(true);
        } else {

            $O_Inscription = new Inscription(false);
            Vue::montrer('helloworld/inscription', array('Identifiant' => $O_Inscription->donneMessage()));
        }


    }

}