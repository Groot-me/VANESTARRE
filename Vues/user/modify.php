
<div id="modify_main_bar">
    <div>
		<a href="index.php?ctrl=flux"> </a>
    </div>
</div>
<br>
<br>

<h3> Modifier votre compte : </h3>

<form action="index.php?ctrl=user&action=update" method="post">

  <input type="text" placeholder="Nouveau pseudo" name="username" value="<?= $A_vue['user']['username'] ?>">
  <input type="text" placeholder="Nouveau mail" name="email" value="<?= $A_vue['user']['email'] ?>">
  <input type="password" placeholder="Ancien mot de passe" name="mdp" value="">
  <input type="text" placeholder="Nouveau mot de passe" name="new_mdp" value="">
  <input type="submit" name="submit" value="Valider modifications">
</form>

<?php

  if(isset($_SESSION['erreur']) && !empty($_SESSION['erreur'])) {
    echo $_SESSION['erreur'];
    unset($_SESSION['erreur']);
  }
 ?>
