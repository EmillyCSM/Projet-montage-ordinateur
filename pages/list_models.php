<?php

if(isset($_GET['modelAdded']) && $_GET['modelAdded']=='succes'){ ?>
<div class="alert alert-info" role="alert">
            Connection avec succès !
        </div> 
<?php } 
// Préparation de la requette BdD en fonction des filtres souhaitées
$sqlModel = "SELECT model.*, SUM(piece.buyingPrice * compose.quantity) AS totalPrice FROM model 
LEFT JOIN `compose` ON model.id = compose.id
LEFT JOIN `piece` ON compose.`id_1` = piece.id ";

$criterias = [];
$criteriasPrice = [];
$params = [];

if (!empty($_POST)) {
    // Collecte données à utilisées avec WHERE
    if (!empty($_POST['isDesktop'])) {
        $filtreIsDesktop = $_POST['isDesktop'];
        $criterias[] = 'isDesktop = :isDesktop';
        $params[':isDesktop'] = $filtreIsDesktop;
    }
    // Collecte données à utilisées avec HAVING (car Where non compatible avec sum().)
    if (!empty($_POST['maxPrice']) && $_POST['maxPrice'] > 0) {
        $filtrePrixMax = $_POST['maxPrice'] * 100;
        $criteriasPrice[] = 'totalPrice <= :totalPriceMax';
        $params[':totalPriceMax'] = $filtrePrixMax;
    }

    if (!empty($_POST['minPrice']) && $_POST['minPrice'] > 0) {
        $filtrePrixMin = $_POST['minPrice'] * 100;
        $criteriasPrice[] = 'totalPrice >= :buyingPriceMin';
        $params[':buyingPriceMin'] = $filtrePrixMin;
    }

    // Construction de la requête SQL 
    if (!empty($criterias)) {
        $sqlModel .= ' WHERE ';
        $sqlModel .= implode(' AND ', $criterias);
    }

    $sqlModel .= ' GROUP BY model.id ';
    if (!empty($criteriasPrice)) {
        $sqlModel .= ' HAVING ';
        $sqlModel .= implode(' AND ', $criteriasPrice);
    }
    // Réalisation du tri
    if (!empty($_POST['sort'])) {
        $sqlModel .= ' ORDER BY ' . $_POST['sort'];
    }
} else {
    $sqlModel .= ' GROUP BY model.id ';
}

$statement = $connection->prepare($sqlModel);
$statement->execute($params);
$statement->setFetchMode(PDO::FETCH_CLASS, Model::class);
$results = $statement->fetchAll();

?>

<section id="filter_sort">
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
                    <label for="isDesktop" class="form-label">Type :</label>
                    <select name="isDesktop" id="isDesktop" class="form-select">
                        <option value="">-</option>
                        <option value="0" <?php echo (isset($_POST['isDesktop']) && 0 == $_POST['isDesktop']) ? 'selected' : ''; ?>>Ordinateur portable</option>
                        <option value="1" <?php echo (isset($_POST['isDesktop']) && 1 == $_POST['isDesktop']) ? 'selected' : ''; ?>>Ordinateur de bureau</option>
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
                    <option value="totalPrice">Prix modèle</option>
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
            <th>Nom du modèle</th>
            <th>Nombre d'ordinateurs créés avec ce modèle</th>
            <th>Prix total des pièces utilisées</th>
            <th>Quantité en stock</th>
            <th>Date d'ajout</th>
     
            <th>Modifier modèle</th>
            <th>Archiver ou supprimer</th>
        </tr>
        <?php foreach ($results as $result) { ?>
            <tr>
                <td>
                    <a href="?page=model_details&id=<?= $result->getId(); ?>">
                        <?php echo $result->getName(); ?>
                    </a>
                </td>
                <td>
                    <?= $result->getComputerCreationNumber(); ?>
                </td>
                <td>
                    <?= priceFormat($result->getTotalPrice()) . "€"; ?>
                </td>
                <td class="d-flex flex-row justify-content-around align-items-center">
                    <span class="p-1">
                        <?= $result->getId(); ?>
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
                <td>
                    <?= $result->getAddDate(); ?>
                </td>
                <td>
                    <a href="?page=model_form&id=<?php echo $result->getId(); ?>?>" class="btn btn-secondary p-1">
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
                <?php
        }
        ?>

    </table>
</section>