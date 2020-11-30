<?php
require_once('../controller/Controller.php');
$unControleur = new Controller("localhost", "test_mvc", "root", "");

$products = $unControleur->getProduct();
require_once('header.php');
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Prix</th>
            <th scope="col">Stock</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($products as $product) {
        ?>
            <tr>
                <td><?= $product->getNom(); ?></td>
                <td><?= $product->getDescription(); ?></td>
                <td><?= $product->getPrix(); ?>€</td>
                <td><?= $product->getStock(); ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
require_once('footer.php');
