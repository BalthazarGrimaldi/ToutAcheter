<?php
require_once('Model.php');
class Product
{
    private $id;
    private $nom;
    private $description;
    private $prix;
    private $stock;

    public function __construct($id, $nom, $description, $prix, $stock)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->stock = $stock;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getNom(): string
    {
        return $this->nom;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getPrix(): float
    {
        return $this->prix;
    }
    public function getStock(): int
    {
        return $this->stock;
    }

    public static function selectAll()
    {
        $bdd = new Model("localhost", "test_mvc", "root", "");
        $resultats = $bdd->selectAll('product');
        $objets = array();
        foreach ($resultats as $resultat) {
            $objets[] = new self($resultat['id'], $resultat['nom'], $resultat['description'], $resultat['prix'], $resultat['stock']);
        }
        return $objets;
    }
}
