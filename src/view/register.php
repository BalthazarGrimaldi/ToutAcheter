<?php 
require_once("../controller/Controller.php");
$unControleur = new Controller("localhost","test_mvc","root","");
require_once('header.php');
require_once("formulaire/formInsertUser.php");
require_once('footer.php');
if(isset($_POST['Valider'])){
    $unControleur->insertUser($_POST);
    header('location: connexion.php');
}
