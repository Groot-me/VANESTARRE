<?php


class User extends BD
{
    private $identifiants;
    private $email;
    private $password;

    public function Inscription($identifiants, $email, $password )
    {
        if(isset($identifiants,$email,$password))
        {
            //verification si le pseudo est deja utilisé
            $verify = 'SELECT PSEUDO FROM user WHERE PSEUDO ='.$identifiants ;
            $this->getBdd();

            if($this->getUser($verify) == null)
            {
                echo 'Inscription réussi';
            }

        }
        else{

        }

    }

    public function Connexion($identifiants, $password) {

        //verifie arguments

        //connexion BD

        //requete

        // vu

    }
}
