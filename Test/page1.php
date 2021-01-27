<?php




abstract class BDtest
{

    private static $_Bdd;

    //genere la connexion a la BD
    private static function setBdd()
    {

        self::$_Bdd = new PDO('mysql:host=localhost:dbname=article;charset=utf8','root','');
        self::$_Bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected function getBdd()
    {
        if(self::$_Bdd == null) self::setBdd();

        return self::$_Bdd;

    }


    //insertion de tuple
    protected function insertObject($requete)
    {
        if(self::$_Bdd == null) self::setBdd();

        $req = self::$_Bdd->prepare($requete);
        $req->execute();

    }

    //update de table
    protected function UpdateObject($requete)
    {
        if(self::$_Bdd == null) self::setBdd();

        $req = self::$_Bdd->prepare($requete);
        $req->execute();

    }

    //test si emoji existe marche avec n'importe quel requete quasiment certes mais voila xD
    protected function EmojiAlreadyExist($requete)
    {
        if(self::$_Bdd == null) self::setBdd();

        $req = self::$_Bdd->prepare($requete);
        $req->execute();

        if($req == null)
        {
            return false;
        }else {
            return true;
        }

    }


}




//class constantes

final class Constantes
{
    // Les constantes relatives aux chemins

    const REPERTOIRE_VUES = '/';

    public static function repertoireRacine() {
        return realpath(__DIR__ . '/');
    }
    public static function repertoireVues() {
        return self::repertoireRacine() . self::REPERTOIRE_VUES;
    }

}

// class vue
final class Vue {

    public static function montrer ($S_localisation, $A_parametres = array())
    {
        $S_fichier = Constantes::repertoireVues() . $S_localisation . '.php';

        $A_vue = $A_parametres;
        // Démarrage d'un sous-tampon
        ob_start();

        include $S_fichier; // c'est dans ce fichier que sera utilisé A_vue, la vue est incluse dans le sous-tampon

        ob_end_flush();
    }

}

//class article
class article extends BDtest {

    private $id;
    private $text;
    private $tag;
    private $url;

    private $nb_swag;
    private $nb_love;
    private $nb_style;
    private $nb_cute;


    public function GetId()
    {
        return $this->id;
    }


    public function ClickOnEmoji($emoji,$id)
    {
        if($this->id == $id ) {

            $this->getBdd();
            $requete = 'SELECT id_user, id_article, nom_emoji FROM emoji_control WHERE id_user = '.$_SESSION['id_user'].' AND id_article = '.$id;

            if(!$this->EmojiAlreadyExist($requete))
            {

                //il n'a jamais cliqué sur cette article de sa vie on insere donc son like dans emoji_control

                $requete = 'INSERT INTO `emoji_control` (`id_user`, `id_article`, `nom_emoji`) VALUES ("'. $_SESSION['id_user'] .'", "'. $id .'", "'. $emoji .'")';

                $this->insertObject($requete);


            }else{

                //il a deja liké l'article donc il peut cliquer sur le meme pour enlever le like ou cliquer sur un autre
                $requete = 'SELECT id_user, id_article, nom_emoji FROM emoji_control WHERE id_user = '.$_SESSION['id_user'].' AND id_article = '.$id.'AND nom_emoji = '.$emoji ;

                if(!$this->EmojiAlreadyExist($requete)){

                    //il clique donc sur un autre emoji
                    $requete = 'UPDATE `articles` SET `nom_emoji` ='.$emoji.'WHERE `emoji_control`.`id_user` ='.$_SESSION['id_user'].'AND `emoji_control`.`id_article` ='.$id;
                    $this->UpdateObject($requete);


                }else{

                    //il clique donc sur le meme emoji

                    echo ' vous avez deja like cette emoji ';

                }



            }

        }
    }


    public function __construct($id, $url, $text, $tag = null, $nb_love, $nb_cute, $nb_style, $nb_swag)
    {
        $this->id = $id ;
        $this->url = $url;
        $this->text = $text;
        $this->tag = $tag;

        $this->nb_love = $nb_love;
        $this->nb_cute = $nb_cute;
        $this->nb_style = $nb_style;
        $this->nb_swag = $nb_swag;


        //on va dire qu'on cree la vue aussi ici

        $tabarticle = array('id'=>$id,'url'=> $url, 'text'=>$text, 'tag' => $tag, 'nb_love'=>$nb_love,'nb_cute'=>$nb_cute,'nb_style'=>$nb_style,'nb_swag' => $nb_swag );
        Vue::montrer('page2',$tabarticle);

    }

}






//l'utilisateur s'est connecté et son id est 1

$_SESSION['id_user'] = 1;



// simulation de boucle et requete qui cree un article
$article = new article(1, 'https://d1fmx1rbmqrxrr.cloudfront.net/cnet/optim/i/edit/2019/04/eso1644bsmall__w770.jpg', 'SALUT LES POTOOOOOS', 'wow',0,0,1,0);
$article = new article(2, 'https://d1fmx1rbmqrxrr.cloudfront.net/cnet/optim/i/edit/2019/04/eso1644bsmall__w770.jpg', 'TEST', 'weshdene',0,1,0,0);
$article = new article(3, 'https://d1fmx1rbmqrxrr.cloudfront.net/cnet/optim/i/edit/2019/04/eso1644bsmall__w770.jpg', 'YOOOOOOOOOOOOOOO', 'enorme',1,0,0,0);
$article = new article(4, 'https://d1fmx1rbmqrxrr.cloudfront.net/cnet/optim/i/edit/2019/04/eso1644bsmall__w770.jpg', 'YO0000dddddd', 'jpepe',1,0,0,0);


?>



