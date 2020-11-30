<?php
require_once('../controller/Controller.php');
$unControleur = new Controller("localhost", "test_mvc", "root", "");

$users = $unControleur->getUsers();
require_once('header.php');
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <?php
            if ($_SESSION['nom'] == "admin") {
            ?>
                <th scope="col">Mot de passe</th>
            <?php
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $user) {
        ?>
            <tr>
                <td><?= $user->getId(); ?></td>
                <td><?= $user->getNom(); ?></td>
                <td><?= $user->getEmail(); ?></td>
                <?php
                if ($_SESSION['nom'] == "admin") {
                ?>
                    <td><?= $user->getMdp(); ?></td>
                <?php
                }
                ?>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
require_once('footer.php');
