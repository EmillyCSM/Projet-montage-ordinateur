<?php
$errors = false;

if (!empty($_GET['typePiece']) && array_key_exists($_GET['typePiece'], Piece::CATEGORIES)) {
    $type = $_GET['typePiece'];
    $className = ucfirst($type);
    $piece = new $className($_POST);
}

if (!empty($_POST)) {
    array_walk($_POST, function ($value, $key) use (&$errors) {
        $item = trim($value);

        if (empty($item) && !($item == 0)) {
            $errors = true;
        }
    });
    var_dump($_POST);
    var_dump($piece);

    if ($errors) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo "Merci de remplir tous les champs."; ?>
        </div>
        <?php
    } else {
        // Insertion des informations en BdD 
        $insertPiece = "INSERT INTO `piece`(`name`, `brand`, `buyingPrice`, `quantity`, `isDesktop`, `isArchived`, `description`, `category`) VALUES (:name, :brand, :buyingPrice, :quantity, :isDesktop, :isArchived, :description, :category);";
        $statement = $connection->prepare($insertPiece);

        $statement->bindValue(':name', $piece->getName(), PDO::PARAM_STR);
        $statement->bindValue(':brand', $piece->getBrand(), PDO::PARAM_STR);
        $statement->bindValue(':buyingPrice', $piece->getBuyingPrice() * 100, PDO::PARAM_INT);
        $statement->bindValue(':quantity', $piece->getQuantity(), PDO::PARAM_INT);
        $statement->bindValue(':isDesktop', $piece->getIsDesktop(), PDO::PARAM_BOOL);
        $statement->bindValue(':isArchived', $piece->getIsArchived(), PDO::PARAM_BOOL);
        $statement->bindValue(':description', $piece->getDescription(), PDO::PARAM_STR);
        $statement->bindValue(':category', "graficCard", PDO::PARAM_STR);
        $statement->execute();
        // fin insertion données parent : Pièce

        if ($type == 'graficCard') {
            $insertGarficCard = "INSERT INTO graficcard (`id`,`chipset`, `memory`) VALUES (:id, :chipset, :memory);";
            $statementGC = $connection->prepare($insertGarficCard);

            $statementGC->bindValue(':id', $connection->lastInsertId(), PDO::PARAM_INT);
            $statementGC->bindValue(':chipset', $piece->getChipset(), PDO::PARAM_STR);
            $statementGC->bindValue(':memory', $piece->getMemory(), PDO::PARAM_INT);

            $statementGC->execute();
        }
    }


}



// var_dump($errors);
?>
<section id="addPiecePage" class="container">
    <h2>Formulaire ajout ou modification de pièce</h2>
    <!-- Type of piece choice-->
    <h4 class="form-label">Choisissez le type de pièce</h4>
    <ul class="list-unstyled d-flex flex-wrap gap-2">
        <?php foreach (Piece::CATEGORIES as $slug => $name) {
            ?>
            <li>
                <a href="?page=add_piece&typePiece=<?= $slug; ?>" class="btn btn-secondary mb-3"><?= $name; ?></a>
            </li>
            <?php
        }
        ?>
    </ul>
    <!-- Include Formular -->

    <?php
    if (isset($type)) {
        include_once 'includes/add_piece/start_form.php';
        include_once 'includes/add_piece/' . $type . '.php';
        include_once 'includes/add_piece/end_form.php';
    }