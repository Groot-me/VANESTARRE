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
            else
            {
                echo 'pseudo deja utilisé';
            }

        }
        else{

        }

    }

    public function Connexion($identifiants, $password) {

        //verifie arguments
        if(isset($_POST['username'/*identifiant*/]) && isset($_POST['password'])){
            $this->getBdd(); //connexion BD
            $username = $this->quote($_POST['username']);
            $password =  password_hash($password, PASSWORD_DEFAULT);
            $sql = "SELECT * FROM user WHERE username = $username 
                        AND password = '$password'";
            $select = $this->query($sql); //requete
            if($select->rowCount() > 0 ){
                $SESSION['Auth'] = $select->fetch();
                setFlash('Vous êtes maintenant connecté'); //vue
                header('Location:' . WEBROOT . 'Site.php'); //lien vers Site.
                die();
            }
        }

    }
    //CONNEXION REUSSIE
    function flash(){
        $message = 'Vous êtes bien connecté';
        $type = 'succes';
        if(isset($_SESSION['Flash'])){
            extract($_SESSION['Flash']);
            unset($_SESSION['Flash']);
            return "<div class = 'alert alert-$type'>$message</div>";

        }//flash()

    }
    function setFlash($message, $type = 'success'){
        $_SESSION['Flash']['message'] = $message;
        $_SESSION['Flash']['type']    = $type;

    }//setFlach
}
