kkkkkk<?php

  class User extends Model  {

    public function create($username, $email, $password) {
      $bdd = self::getBdd();

      $req = $bdd->prepare('INSERT INTO user (username, email, password) VALUES (?, ?, ?)');
      $req->execute(array($username, $email, $password));

    }

    public function read() {
      $bdd = self::getBdd();

      $res = $bdd->query('SELECT * FROM user');
      return $res->fetchAll();

    }

    public function update($username, $email, $id) {
      $bdd = self::getBdd();

      $req = $bdd->prepare('UPDATE user SET username = ?, email = ? WHERE id= ?');
      $req->execute(array($username, $email, $id));

    }

    public function delete($id) {
      $bdd = self::getBdd();

      $req = $bdd->prepare('DELETE FROM user WHERE id=?');
      $test = $req->execute(array($id));

    }

    public function getUserById($id) {
      $bdd = self::getBdd();

      $res = $bdd->query('SELECT * FROM user WHERE id='.$id);
      return $res->fetch();
    }

    public function loginSuccess($username, $password) {
      $bdd = self::getBdd();

      $req = $bdd->prepare('SELECT * FROM user WHERE username = ? and password = ?');
      $res = $req->execute(array($username, $password));

      if($res) {
        return $req->fetch()['id'];
      }
     return -1;

    }

    public function usernameExist($username) {
      $bdd = self::getBdd();

      $req = $bdd->prepare('SELECT * FROM user WHERE username = ?');
      $req->execute(array($username));

      return $req->fetch();

    }

    public function emailExist($email) {
      $bdd = self::getBdd();

      $req = $bdd->prepare('SELECT * FROM user WHERE email = ?');
      $req->execute(array($email));

      return $req->fetch();

    }

  }

 ?>
