<?php


abstract class Model
{
    private static $_Bdd;

    //genere la connexion a la BD
    private static function setBdd() {
      $servername = 'localhost:3306';
      $username = 'toor';
      $password = 'iEm!z711';

      self::$_Bdd = new PDO("mysql:host=$servername;dbname=projet", $username, $password);
      self::$_Bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected function getBdd()
    {
        if(self::$_Bdd == null) self::setBdd();

        return self::$_Bdd;

    }

}
