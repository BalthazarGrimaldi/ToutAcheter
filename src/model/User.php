<?php
require_once('Model.php');
class User
{
    private $id;
    private $nom;
    private $email;
    private $mdp;

    public function __construct($id, $nom, $email, $mdp)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->mdp = $mdp;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getMdp()
    {
        return $this->mdp;
    }

    public static function selectAll()
    {
        $bdd = new Model("localhost", "test_mvc", "root", "");
        $resultats = $bdd->selectAll("user");
        $objets = array();
        foreach ($resultats as $resultat) {
            $objets[] = new self($resultat['id'], $resultat['nom'], $resultat['email'], $resultat['mdp']);
        }
        return $objets;
    }
}
