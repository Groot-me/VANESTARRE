<?php

final class ControleurUser
{
    public function defautAction() {

		session_start();
		if(isset($_SESSION['admin']) && $_SESSION['admin']) {

			$user =  new User();
        	Vue::montrer('user/voir', array('users' =>  $user->read()));
		}
		else {
			header('Location: ./flux');
		}
    }

   public function deleteAction() {

      if(isset($_SESSION['admin']) && $_SESSION['admin']) {
		  
        $user =  new User();
        $user->delete($_GET['id']);

        header('Location: ./user');
      }

      else {
        header('Location: ./');
      }

    }

    public function createAction() {

      $user =  new User();
      $user->create($_POST['username'], $_POST['email'], $_POST['password']);

      Vue::montrer('user/voir', array('users' =>  $user->read()));

    }

    public function updateAction() {

      session_start();

      $user = new User();
      $id = $user->loginSuccessById($_SESSION['id'], sha1($_POST['mdp']));


      if($id > -1) {

        if(isset($_POST['new_mdp']) and !empty($_POST['new_mdp'])) {
          $user->update($_POST['username'], $_POST['email'], sha1($_POST['new_mdp']), $_SESSION['id']);
        }
        else {

          $user->update($_POST['username'], $_POST['email'], sha1($_POST['mdp']), $_SESSION['id']);
        }

        header('Location: ./flux');

      }
      else {
        $_SESSION['erreur'] = "Mot de passe invalide";
        header('Location: index.php?ctrl=user&action=modify');
      }





    }


    public Function modifyAction() {

      session_start();

      if(isset($_SESSION['id'])) {
        $user =  new User();
        Vue::montrer('user/modify', array('user' =>  $user->getUserById($_SESSION['id'])));
      }

      else {
        header('Location: /login');
      }

    }


    public function changePwdAction() {

      Vue::montrer('user/password', array());

    }

    public function mailAction() {

      $user = new User();
      session_start();

      if(isset($_POST['username']) && isset($_POST['email']) && !empty($_POST['username']) && !empty($_POST['email'])) {

        $id = $user->exist($_POST['username'], $_POST['email']);
        if($id > -1) {

          $newMdp = bin2hex(random_bytes(5));

          $res = mail ($_POST['email'] , "Nouveau identifiant Vanestarre" , "Votre mdp est = ".$newMdp);

          if($res) {
            $user->setNewMdp(sha1($newMdp), $id);
          }

          header('Location: ./');

        }
        else {

          $_SESSION['erreur'] = "Un des champs n'est pas correcte";
          header('Location: ./index.php?ctrl=user&action=changepwd');
        }
      }
      else {

        $_SESSION['erreur'] = "Remplissez les 2 champs";
        header('Location: ./index.php?ctrl=user&action=changepwd');
      }


    }

}
