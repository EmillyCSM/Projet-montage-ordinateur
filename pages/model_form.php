<?php
// affichage des pièce dns le formulaire
$sql = "SELECT * FROM `piece` WHERE isArchived = :isArchived";
$statement = $connection->prepare($sql);
$statement->bindValue(':isArchived', false, PDO::PARAM_BOOL);
$statement->setFetchMode(PDO::FETCH_CLASS, Piece::class);
$statement->execute();
$results = $statement->fetchAll();

// envoie des données en BDD
$add_model = "INSERT INTO `model`(`name`, `isDesktop`, `description`, `id_1`) VALUES ( :name, :isDesktop, :description, :id_1);";
$statementInsert = $connection->prepare($add_model);

if (!empty($_POST)) {
    $errors = false;

    if (empty(trim($_POST['name']))) {
        $errors = true;
    }
    foreach (Piece::CATEGORIES as $key => $category) {
        if (empty($_POST[$key])) {
            $errors = true;
        }
        $sqlPiece = "SELECT * FROM `piece` WHERE id = :id ;";
        $statement = $connection->prepare($sqlPiece);
        $statement->bindValue(':id', $_POST[$key], PDO::PARAM_INT);
        $statement->setFetchMode(PDO::FETCH_CLASS, Piece::class);
        $statement->execute();
        $result = $statement->fetch();
        if ($_POST['isDesktop'] != $result->getIsDesktop()) {
            $errors = true; ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                <div>
                    Les pièces choisies ne sont pas compatibles!
                </div>
            </div>
        <?php }
        if (empty($_POST[$key . '_quantity']) || $_POST[$key . '_quantity'] < 0) {
            $errors = true; ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                <div>
                    La quantité d'une pièce ne peut pas être inferieur à 1!
                </div>
            </div>
        <?php }
    }
    if (!$errors) {
        $statementInsert->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $statementInsert->bindValue(':isDesktop', $_POST['isDesktop'], PDO::PARAM_BOOL);
        $statementInsert->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
        $statementInsert->bindValue(':id_1', $_SESSION['user']->getId(), PDO::PARAM_INT);
        $statementInsert->execute();

        // récupérer id modèle
        $id_model = $connection->lastInsertId();

        foreach (Piece::CATEGORIES as $key => $category) {
            $id = $_POST[$key];

            $quantity = $_POST[$key . '_quantity'];
            echo "id";
            var_dump($id);
            echo "quantity";
            var_dump($quantity);
            $add_compose = "INSERT INTO `compose`(`id`, `id_1`, `quantity`) VALUES (:id,:id_1,:quantity);";
            $statement = $connection->prepare($add_compose);
            $statement->bindValue(':id', $id_model, PDO::PARAM_INT);
            $statement->bindValue(':id_1', $id, PDO::PARAM_INT);
            $statement->bindValue(':quantity', $quantity, PDO::PARAM_INT);
            $statement->execute();
        }
    }
}
?>
<section id="model_form" class="container">
    <h1 class="mt-4 mb-4">Formulaire de création d'un modèle</h1>
    <form method="post" class="row">
        <div class="row gap-4 ">
        <div class="col-5 form-group">
                    <label for="isDesktop" class="mb-2">Type</label>
                    <select name="isDesktop" id="isDesktop" class="form-select" required>
                        <option value="">- type -</option>
                        <option value="0" > Ordinateur portable
                        </option>
                        <option value="1">Tour</option>
                    </select>
                </div>
                <div class="col-5 form-group">
                    <label for="name" class="mb-2">Nom du modèle</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

            <div class="row col-12 gap-4 justify-content-center">
                <?php
                foreach (Piece::CATEGORIES as $key => $category) { ?>
                    <div class=" col-3 form-group ">
                        <label for="<?= $key ?>" class="mb-2"><?= $category ?></label>
                        <select name="<?= $key ?>" id="<?= $key ?>" class="form-select" required>
                            <option value="">-
                                <?= $category ?> -
                            </option>
                            <?php foreach ($results as $result) {
                                if ($result->getCategory() == $key) { ?>
                                    <option value="<?= $result->getId(); ?>"><?= $result->getName(); ?></option>
                                <?php }
                            } ?>
                        </select>
                        <label for="<?= $key ?>_quantity" class="mb-2">Quantité <?= $category ?></label>
                        <input type="number" name="<?= $key ?>_quantity" id="<?= $key ?>_quantity" class="form-control mb-3"
                            value="1" required>
                    </div>
                <?php }
                ?>
            </div>
            <div class="row col-12 gap-4 justify-content-center">
                <div class="form-group">
                    <label for="description" class="mb-2">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"
                        class="form-control mb-5"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-dark m-auto w-25">Valider</button>
        </div>
    </form>
</section>