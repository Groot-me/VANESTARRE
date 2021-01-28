<?php

final class ControleurLogin
{
    public function defautAction() {

      session_start();
      if(isset($_SESSION['id'])) {
        header('Location: ./flux');
      }

      Vue::montrer('login/voir', array());

    }

    public function loginAction() {

      $user = new User();
      $id = $user->loginSuccess($_POST['username'], sha1($_POST['password']));

      if($id > 0) {

        session_start();

        $_SESSION['id'] = $id;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['connected'] = True;

        // if($user->isAdmin($id)) {
        //   $_SESSION['admin'] = True;
        // }

        header('Location: index.php?ctrl=flux');
      }
      else {
        print 'erreur';
      }


    }

    public function logoutAction() {

      session_start();
      session_destroy();
      header('Location: ./');

    }

}
