<?php

final class ControleurRegister
{
    public function defautAction() {

        if(isset($_SESSION['id'])) {
          header('Location: ./flux');
        }

        Vue::montrer('Register/voir', array());

    }

    public function registerAction() {


    session_start();

    $user = new user();

      if(!empty($_POST['username']) and !empty($_POST['password']) and !empty($_POST['password2']) and !empty($_POST['email'])){

        if($_POST['password'] == $_POST['password2']){

          $username = htmlspecialchars($_POST['username']);
          $password = htmlspecialchars(sha1($_POST['password']));
          $email = htmlspecialchars($_POST['email']);

          if(!$user->usernameExist($username)){

            if(!$user->emailExist($email)){

              $user->create($username, $email, $password);

              $_SESSION['username'] = $username;
              header('location: index.php');
            }else{
              $_SESSION['error'] = 'Email déja utilisée !';
              header('location: index.php?ctrl=register');
            }
          }else{
            $_SESSION['error'] = 'Username déja utilisé !';
            header('location: index.php?ctrl=register');
          }
        }else{
          $_SESSION['error'] = 'Les passwords ne correspondent pas !';
          header('location: index.php?ctrl=register');
        }
      }
      else {
        $_SESSION['error'] = 'Veuillez remplir tous les champs !';
        header('location: index.php?ctrl=register');
      }

        unset($_SESSION['error']);

        header('Location: index.php?ctrl=login');

    }

}
