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

      $user =  new User();
      $user->delete($_GET['id']);

      Vue::montrer('user/voir', array('users' =>  $user->read()));

    }

    public function createAction() {

      $user =  new User();
      $user->create($_POST['username'], $_POST['email'], $_POST['password']);

      Vue::montrer('user/voir', array('users' =>  $user->read()));

    }

    public function updateAction() {

      $user =  new User();
      session_start();
      $user->update($_POST['username'], $_POST['email'], $_SESSION['id']);

      header('Location: ./flux');

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

}
