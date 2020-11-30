<?php
require_once("../model/Model.php");
require_once('../model/User.php');
require_once('../model/Product.php');

class Controller
{
    private $unModele;
    private $users;
    private $product;

    public function __construct($server, $bdd, $user, $mdp)
    {
        //instanciation de la class modele
        $this->unModele = new Model($server, $bdd, $user, $mdp);
        $this->users = User::selectAll();
        $this->product = Product::selectAll();
    }

    public function verifCon($email, $mdp)
    {
        // on peu controler les donnees 
        return $this->unModele->verifCon($email, $mdp);
    }

    public function insertUser($tab)
    {
        $this->unModele->insertUser($tab);
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function insertProduct($tab)
    {
        $this->unModele->insertProduct($tab);
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function deleteProduct($element)
    {
        $this->unModele->deleteProduct($element);
    }

    public function update($champ, $table, $value, $id)
    {
        $this->unModele->update($champ, $table, $value, $id);
    }
}
