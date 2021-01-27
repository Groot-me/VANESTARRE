<?php


abstract class BD
{

    private static $_Bdd;

    //genere la connexion a la BD
    private static function setBdd()
    {
        self::$_Bdd = new PDO('mysql:host=localhost;dbname=VANESTARRE;charset=utf8','root','');
        self::$_Bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected function getBdd()
    {
        if(self::$_Bdd == null) self::setBdd();

        return self::$_Bdd;

    }


    //recherche de tuple
    protected function getUser($requete)
    {

        if(self::$_Bdd == null) self::setBdd();

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

    //insertion de tuple
    protected function insertObject($requete)
    {
        if(self::$_Bdd == null) self::setBdd();

        $req = self::$_Bdd->prepare($requete);
        $req->execute();

    }






}
