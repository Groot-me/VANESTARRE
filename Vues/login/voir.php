
<div class="form">
        <!--Titre -->

        <h1>VANESTARRE</h1>

        <!--Formulaire Connexion-->
        <form id="form" action="index.php?ctrl=login&action=login" method="post">
            <input type="text" placeholder="Identifiant" name="username" required> <br>
            <input type="password" placeholder="Mot de passe" name="password" required>

            <input type="submit" value="Connexion">

            <a id="forgot" href="">Mot de passe oublié ?</a>

            <button id="btnRegister" class="btnPopup"> <a href="./register"> Créer un compte</a> </button>

            <button id="btnInvite" class="btnmembre"> <a href="index.php?ctrl=flux"> Connexion en mode invité</a> </button>
          </form>


    </div>
