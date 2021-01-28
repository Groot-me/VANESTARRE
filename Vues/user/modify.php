
<div id="modify_main_bar">
    <div>

    </div>
</div>
<br>
<br>

<h3> Modifier votre compte : </h3>

<form action="index.php?ctrl=user&action=update" method="post">

  <input type="text" placeholder="Nouveau pseudo" name="username" value="<?= $A_vue['user']['username'] ?>">
  <input type="text" placeholder="Nouveau mail" name="email" value="<?= $A_vue['user']['email'] ?>">
  <input type="submit" name="submit" value="Valider les modifications">
</form>
