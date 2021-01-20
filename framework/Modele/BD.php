<?php


abstract class BD
{
    private static $_Bdd;

    //genere la connexion a la BD
    private static function setBdd()
    {
        self::$_Bdd = new PDO('mysql:host=localhost:dbname=VANESTARRE;charset=utf8','root','');
    }

    protected function getBdd()
    {
        if(self::$_Bdd == null) self::setBdd();

        return self::$_Bdd;

    }

    protected function getUser($requete)
    {
        $tab = [];
        $req = self::$_Bdd->prepare($requete);
        $req->execute();

        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $tab[] = $data ;
        }
        return $tab;
        $req->closeCursor();

    }

}
