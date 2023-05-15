<?php
// requette BDD + flitre
$sqlBrand = "SELECT `brand` FROM `piece` GROUP BY `brand` ORDER BY `brand`;";
$statementBrand = $connection->query($sqlBrand);
$brands = $statementBrand->fetchAll();



$sql = "SELECT * FROM `piece`";

$criterias = [];
$params = [];
if (!empty($_POST)) {
    if (!empty($_POST['maxPrice']) && $_POST['maxPrice'] > 0) {
        $filtrePrixMax = $_POST['maxPrice'] * 100;
        $criterias[] = 'buyingPrice <= :buyingPriceMax';
        $params[':buyingPriceMax'] = $filtrePrixMax;
    }

    if (!empty($_POST['minPrice']) && $_POST['minPrice'] > 0) {
        $filtrePrixMin = $_POST['minPrice'] * 100;
        $criterias[] = 'buyingPrice >= :buyingPriceMin';
        $params[':buyingPriceMin'] = $filtrePrixMin;
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

    if (isset($_POST['isDesktop']) && $_POST['isDesktop'] != '') {
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
                <input type="number" name="minPrice" id="minPrice" value="<?php if (isset($_POST['minPrice'])) { echo $_POST['minPrice'];} ?>">
            </div>
            <div class="form-group col-4">
                <label for="maxPrice">Prix max :</label>
                <input type="number" name="maxPrice" id="maxPrice"  value="<?php if (isset($_POST['maxPrice'])) { echo $_POST['maxPrice'];} ?>">
            </div>
            <div class="form-group col-4">
                <label for="category">Catégorie :</label>
                <select name="category" id="category" class="form-select">
                    <option value="">Choisissez votre catégorie</option>
                    <?php foreach (Piece::CATEGORIES as $key => $category) { ?>
                        <option value="<?= $key ?>" <?php echo (isset($_POST['category']) && $key == $_POST['category']) ? 'selected' : ''; ?>>
                            <?= $category ?>
                        </option>

                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-4">
                <label for="brand">Marque :</label>
                <select name="brand" id="brand" class="form-select">
                    <option selected value="">Choisissez la marque</option>
                    <?php foreach ($brands as $brand) { ?>
                        <option value="<?= $brand['brand']; ?>" 
                            <?php echo (isset($_POST['brand']) && $brand['brand'] == $_POST['brand']) ? 'selected' : ''; ?>><?= $brand['brand']; ?>
                        </option>
                    <?php } ?>

                </select>
            </div>
            <div class="form-group col-12 w-25">
                <label for="isDesktop">Type :</label>
                <select name="isDesktop" id="isDesktop" class="form-select">
                    <option selected value="">Choisissez votre type</option>
                    <option value="0" <?php echo (isset($_POST['isDesktop']) && 0 == $_POST['isDesktop']) ? 'selected' : ''; ?>>Ordinateur portable</option>
                    <option value="1" <?php echo (isset($_POST['isDesktop']) && 1 == $_POST['isDesktop']) ? 'selected' : ''; ?>>Ordinateur de bureau</option>
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
            <th>modifier la pièce</th>
            <th>supprimer ou archiver</th>
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
                    <?php echo priceFormat($result->getBuyingPrice() / 100) . " €"; ?>
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
                <td>
                    <a href="?page=update_piece&id=<?php echo $result->getId();?>">Modifier</a>
                </td>
                <td>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg> </a>
                <a href="#">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
  <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
</svg>  </a>
                </td>
            </tr>
        <?php } ?>
    </table>