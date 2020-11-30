<?php
/*
    Une redirection "home" (index.php)
    Une redirection "connexion" si pas connecté 
    Une redirection "inscription" si pas connecté
    Une redirection "deconnexion" si connecté
*/

/*
    Une page ou il a marqué "utilisateurs" et ça t'affiche sous forme de tableau tout les utilsateurs inscrits (nom; email)
    Un jeune une sollution 
*/
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://localhost/ToutAcheter">Projet MVC</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/ToutAcheter">Accueil<span class="sr-only">(current)</span></a>
            </li>
            <?php
            if (!isset($_SESSION['nom'])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/ToutAcheter/src/view/connexion.php">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/ToutAcheter/src/view/register.php">Inscription</a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/ToutAcheter/src/view/deco.php">Deconnexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/ToutAcheter/src/view/listUsers.php">Liste d'utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/ToutAcheter/src/view/listProduct.php">Liste des produits</a>
                </li>
                <?php
                if ($_SESSION['nom'] == "admin") {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/ToutAcheter/src/view/productManagement.php">Gestion des produits</a>
                    </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
</nav>