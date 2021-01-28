
<table>

<?php
  foreach ($A_vue['users'] as $nbr => $user) {  ?>

    <tr>
      <td><?= $nbr+1 ?></td>
      <td><?= $user['id'] ?></td>
      <td><?= $user['username'] ?></td>
      <td><?= $user['email'] ?></td>
      <td><?= $user['password'] ?></td>

      <td><button name="delete"><a href="index.php?ctrl=user&action=delete&id=<?= $user['id']?>" >Delete</a></button></td>';
      <td><button name="modify"><a href="index.php?ctrl=user&action=modify">Update</a></button></td>';
    </tr>

<?php } ?>

</table>

<button type="button" name="button"> <a href="index.php?ctrl=user&action=createbob">Create BOB</a> </button>
<?php

  session_start();

  if($_SESSION['connected']) {
    print('Connecté en tant que '. $_SESSION['username']);
  }

 ?>
