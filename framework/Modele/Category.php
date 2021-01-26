<?php
include 'BD.php';

class Category
{
    private $id;
    private $name;
    private $slug;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;

    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;

    }

    public function delete($id){

        if(isset( $_GET['delete'])){

            $id = $_GET['delete'];

            $db = mysqli_connect('127.0.0.1','root','','test')
            or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
            $db->query("DELETE FROM categories WHERE id= $id");

            echo 'La catégorie a bien été supprimée';
            header('Location:category.php');
            die();
        }
    }


    public function create($id){
        if(isset($_POST['name']) && isset($_POST['slug'])) {

            $name = $_POST['name'];
            $slug = $_POST['slug'];

            $db = mysqli_connect('127.0.0.1','root','','test')
            or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
            $db->query("INSERT INTO categories SET name=$name , slug = $slug");

            echo'la catégorie a bien été ajoutée ';
            header('Location:category.php');
            die();
        }
        else{
            echo 'le slug n\'est pas valide';
        }

    }



    public function update($id){

        if(isset($_POST['name']) && isset($_POST['slug'])) {

            $name = $_POST['name'];
            $slug = $_POST['slug'];

            $db = mysqli_connect('127.0.0.1','root','','test')
            or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
            $db->query("UPDATE categories SET name = $name, slug = $slug");

            echo'la catégorie a bien été modifi"éee ';
            header('Location:category.php');
            die();
        }
        else{
            echo 'le slug n\'est pas valide';
        }


    }

    public function showCategory(){

        
    }
}