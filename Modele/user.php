<?php

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

    public function update($username, $email, $password, $id) {
      $bdd = self::getBdd();

      $req = $bdd->prepare('UPDATE user SET username = ?, email = ?, password = ? WHERE id= ?');
      $req->execute(array($username, $email, $password, $id));

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
	  
	  public function getLastId(){
		  $bdd = self::getBdd();

      $req = $bdd->prepare('SELECT MAX(id) AS id FROM user');
      $res = $req->execute();
	  return $req->fetch()['id'];
		  
	  }

    public function loginSuccessById($id, $password) {
      $bdd = self::getBdd();

      $req = $bdd->prepare('SELECT * FROM user WHERE id = ? and password = ?');
      $res = $req->execute(array($id, $password));


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

    public function isAdmin($id) {

      $bdd = self::getBdd();

      $req = $bdd->prepare('SELECT * FROM user WHERE id = ?');
      $req->execute(array($id));

      return $req->fetch()['admin'] == 1;

    }

    public function exist($username, $email) {

      $bdd = self::getBdd();

      $req = $bdd->prepare('SELECT * FROM user WHERE username = ? and email = ?');
      $res = $req->execute(array($username, $email));


      if($res) {
        return $req->fetch()['id'];
      }
      else {
        return -1;
      }

    }

    public function setNewMdp($mdp, $id) {
        $bdd = self::getBdd();

        $req = $bdd->prepare('UPDATE user SET password = ? WHERE id = ?');
        $res = $req->execute(array($mdp, $id));
    }

  }

 ?>
