<?php
require_once('../controller/Controller.php');
$unControleur = new Controller("localhost", "test_mvc", "root", "");

$products = $unControleur->getProduct();
require_once('header.php');
if (isset($_POST["supprimer"])) {
    $unControleur->deleteProduct($_POST["id_product"]);
    header('location: listProduct.php');
}
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Prix</th>
            <th scope="col">Stock</th>
            <th scop="col">Supprimer</th>
            <th scop="col">Modifier</th>

        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($products as $product) {
        ?>
            <tr>
                <td><?= $product->getNom(); ?></td>
                <td><?= $product->getDescription(); ?></td>
                <td><?= $product->getPrix(); ?>‎€</td>
                <td><?= $product->getStock(); ?></td>
                <td>
                    <form action="productManagement.php" method="post">
                        <input type="hidden" name="id_product" value="<?= $product->getId(); ?>">
                        <input type="submit" class="btn btn-danger" name="supprimer" value="Supprimer">
                    </form>
                </td>
                <td>
                    <form action="editProduct.php" method="post">
                        <input type="hidden" name="product_id" value="<?= $product->getId(); ?>">
                        <input type="hidden" name="product_nom" value="<?= $product->getNom(); ?>">
                        <input type="hidden" name="product_description" value="<?= $product->getDescription(); ?>">
                        <input type="hidden" name="product_prix" value="<?= $product->getPrix(); ?>">
                        <input type="hidden" name="product_stock" value="<?= $product->getStock(); ?>">
                        <input type="submit" class="btn btn-primary" name="modifier" value="Modifier">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
require_once('footer.php');
