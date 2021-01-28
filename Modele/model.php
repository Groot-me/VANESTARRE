<?php


abstract class Model
{
    private static $_Bdd;

    //genere la connexion a la BD
    private static function setBdd() {
      $servername = '127.0.0.1';
      $username = 'root';
      $password = '';

      self::$_Bdd = new PDO("mysql:host=$servername;dbname=projet", $username, $password);
      self::$_Bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected function getBdd()
    {
        if(self::$_Bdd == null) self::setBdd();

        return self::$_Bdd;

    }

}
