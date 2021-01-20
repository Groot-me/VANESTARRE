<?php


class ControleurUser
{


    public function InscriptionAction($Identifiant, $email, $password)
    {
        $new_User = new User ();
        $new_User->Inscription($Identifiant, $email ,$password);

    }

    public function ConnexionAction($Identifiant, $password)
    {
        $new_User = new User ();
        $new_User->Connexion($Identifiant ,$password);

    }


}