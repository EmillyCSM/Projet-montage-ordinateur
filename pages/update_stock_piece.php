<?php
if (!empty($_GET['id'])) {
    $sqlPiece = "SELECT * FROM piece
    WHERE id = :id;";

    $statement = $connection->prepare($sqlPiece);
    $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, Piece::class);
    $piece = $statement->fetch();
    $quantity = $piece->getQuantity();
}

$sqlAddPiece = "UPDATE piece SET quantity = :quantity WHERE id = :id";
$statementAddPiece = $connection->prepare($sqlAddPiece);

if (!empty($_POST)) {
    if ($_POST['isEnter'] == 1) {
        $quantity += $_POST['quantity'];
    } else {
        $quantity -= $_POST['quantity'];
        if ($quantity < 0) {
            $quantity = 0;
            $_POST['quantity'] = $piece->getQuantity(); // Pour enregistrer en BdD uniquement la quantité de pièce restante
        }
    }
    // MaJ de la quantité pièce 
    $statementAddPiece->bindValue('quantity', $quantity, PDO::PARAM_INT);
    $statementAddPiece->bindValue('id', $_GET['id'], PDO::PARAM_INT);
    $statementAddPiece->execute();

    // Insertion de la transation dans l'historique
    $sqlStockHistory = "INSERT INTO `stockhistory`(`isEnter`, `quantity`, `id_1`) VALUES (:isEnter, :quantity, :id_1)";

    $statementStock = $connection->prepare($sqlStockHistory);
    $statementStock->bindValue('isEnter', $_POST['isEnter'], PDO::PARAM_INT);
    $statementStock->bindValue('quantity', $_POST['quantity'], PDO::PARAM_INT);
    $statementStock->bindValue('id_1', $_GET['id'], PDO::PARAM_INT);
    $statementStock->execute();

    header('Location: index.php?page=list_pieces');
}
?>
<section id="model_form" class="container">
    <h1 class="mt-4 mb-4">Stock pièce</h1>

    <div>
        <h3>
            Nom pièce :
            <?= $piece->getName(); ?>
        </h3>
        <h4>Stock actuel :
            <?= $piece->getQuantity(); ?>
        </h4>
    </div>
    <form method="post" class="p-3 m-auto">
        <div class="row d-flex gap-4">
            <div class="form-group col-5 col-md-3">
                <label for="isEnter" class="form-label">Transaction :</label>
                <select name="isEnter" id="isEnter" class="form-select">
                    <option value="0">Sortir</option>
                    <option value="1">Entrer</option>
                </select>
            </div>
            <div class="form-group col-5 col-md-3">
                <label for="quantity" class="form-label">Quantié :</label>
                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="2">
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark w-25 m-auto">Valider</button>
            </div>
        </div>
    </form>

</section>