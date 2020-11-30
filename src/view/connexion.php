<?php
require_once("../controller/Controller.php");
$unControleur = new Controller("localhost", "test_mvc", "root", "");
require_once('header.php');
require_once('formulaire/formConnexion.php');
require_once('footer.php');
if (isset($_POST['Seconnecter'])) {
    $email = $_POST['email'];
    $mdp   = $_POST['mdp'];
    $resultat = $unControleur->verifCon($email, $mdp);

    if (isset($resultat['nom'])) {
        $_SESSION['nom'] = $resultat['nom'];
        header('location: listUsers.php');
    } else {
        echo " connexion raté";
    }
}
