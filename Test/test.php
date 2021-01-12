<?php


include 'utils.inc.php';

function end_page()
{
    echo  "</body></html>";
}



start_page('test');

echo '<hr/><strong>Test</strong><br/><hr/>';

$dateliterraire = date('F d, Y', strtotime('12-03-2001'));
$heure = date('h:m A');


$datebaton = date('d/m/Y', strtotime('12-03-2001'));

echo $datebaton.'<br/>' ;
echo $dateliterraire.',  '.$heure;



/*
$link = mysqli_connect('localhost', 'mysql_username', 'mysql_passwd')
or die('Pb de connexion au serveur: ' . mysqli_connect_error());
*/
?>
<form action="data-processing.php" method="post" style="padding: 1%; border: black 3px solid" >
    <!-- ENORME -->
    <p> Identifiants </p>
    <input type="text" name="id" value="ex: gigileking" onfocus="if(this.value=='ex: gigileking')this.value=''" onblur="if(this.value=='')this.value='ex: gigileking'" required >

    <p> civilité </p>
    <div style="display: flex;flex-flow: row; align-items: center">
        <p> Homme </p>
        <input type="radio" name="sexe" value="Mr" checked>
        <p> Femme </p>
        <input type="radio" name="sexe" value="Mme">
        <p> Autre </p>
        <input type="radio" name="sexe" value=" ">
    </div>

    <p>E-Mail</p>
    <input name="mail" type="email" value="" placeholder="ex: michmich@gmail.com" />

    <p> Mot de Passe </p>
    <input name="mdp" type="password" value="">
    <p> Verification du mot de passe</p>
    <input name="verifmdp" type="password">

    <p>Telephone</p>
    <input type="text" name="tel" value="">

    <p>Pays</p>
    <select class="Menu" name="pays">
        <option  selected disabled value="op"> Pays </option>
        <option  value="France"> France </option>
        <option  value="Italie"> Italie </option>
        <option  value="Espagne">Espagne  </option>
        <option  value="Tombouctou"> Tombouctou </option>
    </select>

    <p>Conditions générales   <input type="checkbox" required> </p>


    <!-- Soumission -->
    <a>
        <input type="submit" name="action" value="Inscription">
    </a>

</form >



<form action="data-processing.php" method="post" >
    <p> Connexion <br> pseudo</p>
   <input type="text" name="pseudo" value="">
    <p> Password</p>
    <input type="password" name="passwdcon" value="">
    <input type="submit" name="connexion" value="connect">
</form>


<?php

end_page();

?>

