<form action="index.php?ctrl=user&action=update" method="post">
  <input type="text" name="username" value="<?= $A_vue['user']['username'] ?>">
  <input type="text" name="email" value="<?= $A_vue['user']['email'] ?>">
  <input type="submit" name="submit" value="Valider les modifications">
</form>
