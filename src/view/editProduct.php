<?php
require_once('../controller/Controller.php');
$unControleur = new Controller("localhost", "test_mvc", "root", "");
$products = $unControleur->getProduct();
require_once('form/header.php');
if (isset($_POST['modifier_edit'])) {
    $unControleur->update("nom", "product", $_POST['product_nom_edit'], $_POST['product_id']);
    $unControleur->update("description", "product", $_POST['product_description_edit'], $_POST['product_id']);
    $unControleur->update("prix", "product", $_POST['product_prix_edit'], $_POST['product_id']);
    $unControleur->update("stock", "product", $_POST['product_stock_edit'], $_POST['product_id']);
    header('location: listProduct.php');
}

?>
<div class="offset-4 col-4">
    <h1>Modifier le produit</h1>
    <form action="" method="post">
        <input type="hidden" name="product_id" value="<?= $_POST['product_id'] ?>">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="product_nom_edit" value="<?= $_POST['product_nom'] ?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="product_description_edit" value="<?= $_POST['product_description'] ?>">
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="text" class="form-control" id="nom" name="product_prix_edit" value="<?= $_POST['product_prix'] ?>">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" id="nom" name="product_stock_edit" value="<?= $_POST['product_stock'] ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="modifier_edit">Modifier</button>
    </form>
</div>
<?php
require_once('form/footer.php');
