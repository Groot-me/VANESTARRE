<?php

final class ControleurUpdateProfile {

    public function defautAction() {

      $user = new User();
      $userToUpdate = $user->getUserById($_GET['id'])[0];

        Vue::montrer('updateProfile/voir', array(
          'username' => $userToUpdate['username'],
          'email' => $userToUpdate['email'],
          'password' => $userToUpdate['password']
        ));

    }

}
