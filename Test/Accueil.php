<?php
if(isset($_POST['username']) && isset($_POST['password'])){
    $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $username = $db ->quote( $_POST['username']);
    $password = sha1($_POST['password']);
    $sql ="SELECT * FROM user WHERE username = $username  AND password = '$password' ";
    $select = $db->query($sql);
    if($select->rowCount() > 0){
        $_SESSION['Auth'] = $select->fetch();
        setFlash('Vous êtes maintenant connecté');
        header('Location:' . WEBROOT . 'admin/index.php');
        die();
    }

}


?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>VANESTARRE - Connexion ou Inscription</title>
    <link rel="stylesheet" href="Accueil.css">
</head>
<body>
    <h1>VANESTARRE</h1>
    <div class="form">
        <form id="form" action="" method="post">
            <input type="text" placeholder="Identifiant" name="uname" required> <br>
            <input type="password" placeholder="Mot de passe" name="psw" required>
            <div class="submit">
                <input type="submit" value="Connexion">
            </div>
            <a id="forgot" href="">Mot de passe oublié ?</a>
            <button id="btnPopup" class="btnPopup">Créer un compte</button>
        </form>
        <div id="overlay" class="overlay">
            <div id="popup" class="popup">
                <form id="form" action="" metho="post">
                    <input type="text" placeholder="Prénom" name="prénom" required> <br>
                    <input type="text" placeholder="Nom" name="nom" required> <br>
                    <input type="text" placeholder="Identifiant" name="uname" required> <br>
                    <input type="password" placeholder="Mot de passe" name="psw" required>
                    <div class="submit">
                        <input type="submit" value="Inscription">
                    </div>
                </form>
            </div>
         </div>
    </div>

</body>
</html>
