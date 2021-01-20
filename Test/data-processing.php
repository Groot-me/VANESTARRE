session_start();

<?php
include 'utils.inc.php';



start_page('Inscription reussi');



$dbLink = mysqli_connect('127.0.0.1','root','','test') or die('Erreur de connexion au serveur : ' . mysqli_connect_error());

// Est ce que je m'inscris ?
if(isset($_POST['action']))
{

    if ($_POST['action'] == 'Inscription') {
        //affectation variable

        if (isset($_POST['id'], $_POST['sexe'], $_POST['mail'], $_POST['mdp'])) {
            $mail = $_POST['mail'];
            $pseudo = $_POST['id'];

            $passwd = $_POST['mdp'];

            $mdpHash = password_hash($passwd, PASSWORD_DEFAULT);

            $sexe = $_POST['sexe'];
            $pays = $_POST['pays'];
            $today = date('Y-m-d');

        }
        if (isset($_POST['tel'])) {
            $phone = $_POST['tel'];
        } else {
            $phone = "NULL";
        }


        //verification si le pseudo est deja utilisé

        $verify = "SELECT PSEUDO FROM user WHERE PSEUDO ='" . $pseudo . "' ";

        if (!($queryresult = mysqli_query($dbLink, $verify))) {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $verify . '<br/>';
            exit();
        }

        $dbRow = mysqli_fetch_array($queryresult);


        if ($dbRow['PSEUDO'] == null) { //si le pseudo n'est pas utilisé insertion de l'utilisateur

            //cree la requete d'insertion
            $insert = 'INSERT INTO user VALUES (NULL, "' . $pseudo . '" , "' . $mail . '", "' . $sexe . '", "' . $mdpHash . '", "' . $phone . '", "' . $pays . '", "' . $today . '")';

            if (!($queryresult = mysqli_query($dbLink, $insert))) {
                echo 'Erreur de requête<br/>';
                // Affiche le type d'erreur.
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                // Affiche la requête envoyée.
                echo 'Requête : ' . $insert . '<br/>';
                exit();
            } else {
                echo 'Inscription réalisé !!!!!!!!!!! ' . '<br>';
            }

        } else {

            echo 'Pseudo deja utiliséééééééééééééééééééééééééééééééé !!!';

        }
    }
}
//connexion !
else {

    if(isset($_POST['pseudo'],$_POST['passwdcon'])) {
        //affectation variable

        $pseudocon = $_POST['pseudo'];
        $passwdcon = $_POST['passwdcon'];

        //requete de connexion avec le pseudo
        $query = "SELECT PSEUDO,PASSWORD FROM user WHERE PSEUDO ='" . $pseudocon . "' ";



        // on envoie la requête et on la test
        if (!($queryresult = mysqli_query($dbLink, $query))) {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }

        $dbRow = mysqli_fetch_array($queryresult);

        if($dbRow['PSEUDO'] == null)
        {
            echo 'Mauvais pseudo !!!!!!!!!!!!';
        }

        if (password_verify($passwdcon, $dbRow['PASSWORD'])) {

            echo 'Connexion réussi' . "<br>" . 'Monsieur ' . $pseudocon;
            echo "<br>" . 'Voici votre mot de passe ' . $dbRow['PASSWORD'] . "<br>";

        } else {

            echo 'MAUVAIS MOT DE PASSSE';
        }

    }

}



// On créé la requête
$query = 'SELECT * FROM user ORDER BY ID';

// on envoie la requête et on la test
if(!($dbResult = mysqli_query($dbLink, $query)))
{
    echo 'Erreur de requête<br/>';
// Affiche le type d'erreur.
    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
// Affiche la requête envoyée.
    echo 'Requête : ' . $query . '<br/>';
    exit();
}

?>
<style>
    table,td,thead {
        border: black 2px solid;
        border-collapse: collapse;
    }
    td {
        padding: 10px;
    }
</style>

<?php


echo "<table><thead>"."Mes données"."</thdead><tbody>";
while($dbRow = mysqli_fetch_array($dbResult))
{
    echo "<tr>";
    echo "<td>".$dbRow['ID']."</td>";
    echo "<td>".$dbRow['PSEUDO']."</td>";
    echo "<td>".$dbRow['MAIL']."</td>";
    echo "<td>".$dbRow['PASSWORD']."</td>";
    echo "<td>".$dbRow['PHONE']."</td>";
    echo "<td>".$dbRow['SEXE']."</td>";
    echo "<td>".$dbRow['PAYS']."</td>";
    echo "<td>".date('d.m.Y', strtotime($dbRow['DATES']))."</td>";
    echo "</tr>";
}

echo "</tbody></table>";






//ça laisse tomber j'ai du installer un truc pour le faire c'est bordel
/*

if(isset($_POST['id'],$_POST['sexe'],$_POST['mail'],$_POST['mdp']))
{
$to = $_POST['mail'];
$id = $_POST['id'];

$mail_yes = true;

}
$message = 'Bonjour '.$_POST['sexe'].' '.$id."\n";
$message .= 'Voici vos identifiants d\'inscription : ' . $id."\n" ;
$message .= 'Email : ' . $to ."\n";
$message .= 'Mot de passe : ' . $_POST['mdp']."\n";
if(isset($_POST['telephone']))
{
$message .= 'Votre n° de telephone: '.$_POST['telephone']."\n";
}

if(isset($_POST['pays']))
{
$message .= 'Votre pays : '.$_POST['pays']."\n";
}

$subject = 'Inscription reussi';


if(mail($to, $subject, $message))
{
echo 'Votre mail a bien été envoyé';
}
else{
echo 'un soucis est apparu';
}

*/