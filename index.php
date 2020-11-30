<?php
require_once('src/view/header.php');
if (!isset($_SESSION['nom'])) {
    header('location: src/view/connexion.php');
}
require_once('src/view/footer.php');
