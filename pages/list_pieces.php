<?php
// Requette BdD pour afficher toutes les marques dans filtre 'Marque'
$sqlBrand = "SELECT `brand` FROM `piece` GROUP BY `brand` ORDER BY `brand`;";
$statementBrand = $connection->query($sqlBrand);
$brands = $statementBrand->fetchAll();

// Préparation de la requette BdD en fonction des filtres souhaitées
$sql = "SELECT * FROM `piece`";

$criterias = [];
$params = [];
if (!empty($_POST)) {
    // Collecte les données saisies
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
    // Construction de la requête SQL 
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

<section id="filter">
    <form method="post" class="container">
        <h3>Filtres</h3>
        <div class="row gap-4">
            <div class="form-group col-4">
                <label for="minPrice">Prix min :</label>
                <input type="number" name="minPrice" id="minPrice" value="<?php if (isset($_POST['minPrice'])) {
                    echo $_POST['minPrice'];
                } ?>">
            </div>
            <div class="form-group col-4">
                <label for="maxPrice">Prix max :</label>
                <input type="number" name="maxPrice" id="maxPrice" value="<?php if (isset($_POST['maxPrice'])) {
                    echo $_POST['maxPrice'];
                } ?>">
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
                        <option value="<?= $brand['brand']; ?>" <?php echo (isset($_POST['brand']) && $brand['brand'] == $_POST['brand']) ? 'selected' : ''; ?>><?= $brand['brand']; ?>
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
                <option value="quantity">Quantité en stock</option>
                <option value="name">Nom</option>
                <option value="brand">Marque</option>
                <option value="buyingPrice">Prix</option>
                <option value="id">Date d'ajout</option>
            </select>
            <button type="submit" class="btn btn-dark m-auto w-25">Valider</button>
        </div>
    </form>
</section>
<section id="tableau_piece" class="container">
    <h1>Tableau des pièces</h1>
    <table>
        <tr>
            <th>Nom de la pièce</th>
            <th>Marque</th>
            <th>Quantité en stock</th>
            <th>Prix</th>
            <th>Nombre de modèles créés avec cette pièce</th>
            <th>Catégories</th>
            <th>Ordi bureau</th>
            <th>Modifier la pièce</th>
            <th>Archiver ou supprimer</th>
        </tr>
        <?php foreach ($results as $result) { ?>
            <tr>
                <td>
                    <?php echo $result->getName(); ?>
                </td>
                <td>
                    <?php echo $result->getBrand(); ?>
                </td>
                <td class="d-flex justify-content-center">
                    <span class="p-1">
                        <?php echo $result->getQuantity(); ?>
                    </span>
                    <a href="#" class="btn btn-secondary p-1 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path
                                d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                            <path fill-rule="evenodd"
                                d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                        </svg>
                    </a>
                </td>
                <td class="p-1">
                    <?php echo priceFormat($result->getBuyingPrice() / 100) . "€"; ?>
                </td>
                <td>
                    <?php echo 0; ?>
                </td>
                <td>
                    <?php
                    if (array_key_exists($result->getCategory(), Piece::CATEGORIES)) {
                        echo Piece::CATEGORIES[$result->getCategory()];
                    }
                    ?>
                </td>
                <td>
                    <?php echo ($result->getIsDesktop() ? 'Oui' : 'Non'); ?>
                </td>
                <td>
                    <a href="?page=add_piece&id=<?php echo $result->getId(); ?>" class="btn btn-secondary p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen"
                            viewBox="0 0 16 16">
                            <path
                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                        </svg>
                    </a>
                </td>
                <td class="d-flex justify-content-around align-items-center">
                    <a href="#" class="btn btn-secondary p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-archive" viewBox="0 0 16 16">
                            <path
                                d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </a>
                    <a href="#" class="btn btn-danger p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-trash" viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                            <path
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                        </svg>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>