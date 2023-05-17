<?php
// Préparation de la requette BdD en fonction des filtres souhaitées
$sqlModel = "SELECT * FROM `model`";

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

    // Construction de la requête SQL 
    if (!empty($criterias)) {
        $sqlModel .= ' WHERE ';
        $sqlModel .= implode(' AND ', $criterias);
    }
    if (!empty($_POST['sort'])) {
        $sqlModel .= ' ORDER BY ' . $_POST['sort'];
    }
}

$statement = $connection->prepare($sqlModel);
// var_dump($sqlModel);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_CLASS, Model::class);
$results = $statement->fetchAll();

// REQUETTE SQL POUR AVOIR LE NOM DES TOUTES LES PIECES DE MODELS
/*
SELECT piece.name FROM model
	INNER JOIN `compose` ON model.id = compose.id
    INNER JOIN piece ON compose.`id_1` = piece.id
WHERE model.id = 1; 

penser à GROUPE BY model.id
*/
?>

<section id="filter">
    <form method="POST" class="container">
        <div class="row gap-4">
            <div id="filter" class="row">
                <h3>Filtrer par :</h3>
                <div class="form-group col-10 col-md-3">
                    <label for="minPrice" class="form-label">Prix min :</label>
                    <input type="number" name="minPrice" id="minPrice" class="form-control" value="<?php if (isset($_POST['minPrice'])) {
                        echo $_POST['minPrice'];
                    } ?>">
                </div>
                <div class="form-group col-10 col-md-3">
                    <label for="maxPrice" class="form-label">Prix max :</label>
                    <input type="number" name="maxPrice" id="maxPrice" class="form-control" value="<?php if (isset($_POST['maxPrice'])) {
                        echo $_POST['maxPrice'];
                    } ?>">
                </div>
                <div class="form-group col-10 col-md-4">
                    <label for="category" class="form-label">Catégorie :</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">Choisissez votre catégorie</option>
                        <?php foreach (Piece::CATEGORIES as $key => $category) { ?>
                            <option value="<?= $key ?>" <?php echo (isset($_POST['category']) && $key == $_POST['category']) ? 'selected' : ''; ?>>
                                <?= $category ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-check form-switch col-10 col-md-5 align-self-center mt-3">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Afficher les commentaires non
                        lus</label>
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">

                </div>
            </div>
            <div id="sort" class="col-7">
                <h3>Trier par :</h3>
                <select name="sort" id="sort" class="form-select">
                    <option selected value="">-</option>
                    <option value="quantity">Quantité en stock</option>
                    <option value="name">Nom</option>
                    <option value="buyingPrice">Prix</option>
                    <option value="id">Date d'ajout</option>
                    <option value="computerCreationNumber">Nombre d'ordinateurs créés</option>
                </select>
            </div>

            <div class="">
                <button type="submit" class="btn btn-dark w-25 m-auto">Valider</button>
            </div>
        </div>
    </form>
</section>
<!-- Affichage du tableau -->
<section id="model_table" class="container mt-3">
    <h1>Tableau des modèles</h1>
    <table>
        <tr>
            <th>Nom </th>
            <th>Nombre d'ordinateurs créés avec ce modèle</th>
            <th>Prix total des pièces utilisées</th>
            <th>Quantité en stock</th>
            <th>Date d'ajout</th>
            <th>Nombre de commentaires</th> <!-- (avec une indication si des commentaires n'ont pas été lus)  -->
        </tr>
        <?php foreach ($results as $result) { ?>
            <tr>
                <td>
                    <?php echo $result->getName(); ?>
                </td>
                <td>
                    <?= $result->getComputerCreationNumber(); ?>
                </td>
                <td>
                    ---€
                </td>
                <td>
                    -
                </td>
                <td>
                    <?= $result->getAddDate(); ?>
                </td>
                <td>
                    x
                </td>
                <?php
        }
        ?>

    </table>
</section>