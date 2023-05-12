<?php
// requette BDD + flitre
$sqlBrand = "SELECT `brand` FROM `piece` GROUP BY `brand` ORDER BY `brand`;";
$statementBrand = $connection->query($sqlBrand);
$brands = $statementBrand->fetchAll();



$sql = "SELECT * FROM `piece`";

$criterias = [];
$params = [];
if (!empty($_POST)) {
    if (!empty($_POST['maxPrice']) && $_POST['brand'] > 0) {
        $filtrePrixMax = $_POST['maxPrice'];
        $criterias[] = 'buyingPrice <= :buyingPrice';
        $params[':buyingPrice'] = $filtrePrixMax;
    }

    if (!empty($_POST['minPrice']) && $_POST['brand'] > 0) {
        $filtrePrixMin = $_POST['minPrice'];
        $criterias[] = 'buyingPrice <= :buyingPrice';
        $params[':buyingPrice'] = $filtrePrixMin;
    }


    if (!empty($_POST['category'])) {
        $filtreCategory = $_POST['category'];
        $criterias[] = 'category = :category';
        $params[':category'] = $filtreCategory;
    }

    if (!empty($_POST['brand'])) {
        $filtreBrand = $_POST['brand'];
        $criterias[] = 'brand = :brand';
        $params[':brand'] = $filtreBrand;
    }

    if (isset($_POST['isDesktop'])) {
        $filtredesktop = $_POST['isDesktop'];
        $criterias[] = 'isDesktop = :isDesktop';
        $params[':isDesktop'] = $filtredesktop;
    }
    if (!empty($criterias)) {
        $sql .= ' WHERE ';
        $sql .= implode(' AND ', $criterias);
    }
    if (!empty($_POST['sort'])) {
        $sql .= ' ORDER BY ' . $_POST['sort'];
    }
}



$statement = $connection->prepare($sql);

$statement->execute($params);
$statement->setFetchMode(PDO::FETCH_CLASS, Piece::class);
$results = $statement->fetchAll();

?>
</section>
<section id="filter">
    
    <form method="post" class="container">
    <h3>Filtres</h3>
        <div class="row gap-4">

            <div class="form-group col-4">
                <label for="minPrice">Prix min :</label>
                <input type="number" name="minPrice" id="minPrice">
            </div>
            <div class="form-group col-4">
                <label for="maxPrice">Prix max :</label>
                <input type="number" name="maxPrice" id="maxPrice">
            </div>
            <div class="form-group col-4">
                <label for="category">Catégorie :</label>
                <select name="category" id="category" class="form-select">
                    <option selected value="">Choisissez votre catégorie</option>
                    <?php foreach (Piece::CATEGORIES as $key => $category) { ?>
                        <option value="<?= $key ?>"><?= $category ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-4">
                <label for="brand">Marque :</label>
                <select name="brand" id="brand" class="form-select">
                    <option selected value="">Choisissez la marque</option>
                    <?php foreach ($brands as $brand) { ?>
                        <option value="<?= $brand['brand']; ?>"><?= $brand['brand']; ?></option>
                    <?php } ?>

                </select>
            </div>
            <div class="form-group col-12 w-25">
                <label for="isDesktop">Type :</label>
                <select name="isDesktop" id="isDesktop" class="form-select">
                <option selected value="">Choisissez votre type</option>
                    <option value="0">Ordinateur portable</option>
                    <option value="1">Ordinateur de bureau</option>
                </select>
            </div>
            <h3>Trier par :</h3>
            <select name="sort" id="sort" class="form-select">
            <option selected value="">-</option>
                <option value="quantity">quantité en stock</option>
                <option value="name">nom</option>
                <option value="brand">marque</option>
                <option value="buyingPrice">prix</option>
                <option value="id">date d'ajout</option>
            </select>
            <button type="submit" class="btn btn-dark  m-auto w-25">Filter</button>
        </div>
    </form>
</section>
<section id="tableau_piece" class="container">
    <h1>Tableau des pièces</h1>
    <table>
        <tr>
            <th>nom de la pièce</th>
            <th>marque</th>
            <th>quantité en stock</th>
            <th>prix</th>
            <th>nombre de modèles créés avec cette pièce</th>
            <th>catégories</th>
            <th>ordi bureau</th>
        </tr>
        <?php foreach ($results as $result) { ?>
            <tr>
                <td>
                    <?php echo $result->getName(); ?>
                </td>
                <td>
                    <?php echo $result->getBrand(); ?>
                </td>
                <td>
                    <?php echo $result->getQuantity(); ?>
                </td>
                <td>
                    <?php echo priceFormat($result->getBuyingPrice() / 100 ) . " €" ; ?>
                </td>
                <td>
                    <?php echo 0; ?>
                </td>
                <td>
                    <?php echo $result->getCategory(); ?>
                </td>
                <td>
                    <?php echo ($result->getIsDesktop() ? 'Oui' : 'Non'); ?>
                </td>
            </tr>
        <?php } ?>
    </table>

