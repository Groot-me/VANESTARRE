
  <link rel="stylesheet" href="../login/style.css">

    <div class="form">

        <h1>INSCRIPTION</h1>
		
		<div class="form_register_login">
			
        <form id="form" action="index.php?ctrl=Register&action=register" method="post">
            <input type="text" placeholder="Identifiant" name="username" required>
            <input type="text" placeholder="Adresse Mail" name="email" required>
            <input type="password" placeholder="Mot de Passe" name="password" required>
            <input type="password" placeholder="Confirmer le mot de passe" name="password2" required>

            <?php
              session_start();

              if(isset($_SESSION['error'])) {
                print '<span class="error">'.$_SESSION['error'].'</span>';
                unset($_SESSION['error']);
              }
              ?>


            <input type="submit" value="S'inscrire">
        </form>
			
		</div>
		
    </div
		
