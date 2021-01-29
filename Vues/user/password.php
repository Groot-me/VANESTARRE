<form action="index.php?ctrl=user&action=mail" method="post">
  <input type="text" name="username" value="" placeholder="Username">
  <input type="text" name="email" value="" placeholder="Email">
  <input type="submit" name="submit" value="Envoyer nouveau mdp">
</form>

<?php

  session_start();
  if(isset($_SESSION['erreur']) && !empty($_SESSION['erreur'])) {
    echo $_SESSION['erreur'];
    unset($_SESSION['erreur']);
  }
 ?>
