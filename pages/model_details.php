<?php
if (!isset($_GET['id'])) {
    header('Location:?page=list_models');
}

//Requette pour recuperer l'id du model choisi
$sql = "SELECT * FROM `model` WHERE id = :id ;";
$statement = $connection->prepare($sql);
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_CLASS, Model::class);
$models = $statement->fetch();
//Requette pour recuperer la quantité, l'id de la pièce, et la catégorie de la table compose et la table Piece
$sqlPiece = "SELECT compose.quantity, piece.name, piece.category FROM `piece`
INNER JOIN compose ON compose.id_1 = piece.id WHERE compose.id = :id ;";

$statementPiece = $connection->prepare($sqlPiece);
$statementPiece->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$statementPiece->execute();
$statementPiece->setFetchMode(PDO::FETCH_CLASS, Piece::class);
$pieces = $statementPiece->fetchAll();

// Requette BdD Commentaires

if (!empty($_POST)) {
    $sqlComments = "INSERT INTO `comments`(`isRead`, `comment`, `id_1`, `id_2`) VALUES (:isRead, :comment, :id_1, :id_2) ;";
    $statementComments = $connection->prepare($sqlComments);
    $statementComments->bindValue(':isRead', 0, PDO::PARAM_INT);
    $statementComments->bindValue(':comment', $_POST['comment'], PDO::PARAM_STR);
    $statementComments->bindValue(':id_1', $_GET['id'], PDO::PARAM_INT);
    $statementComments->bindValue(':id_2', $_SESSION['user']->getId(), PDO::PARAM_INT);
    $statementComments->execute();

    header('Location: index.php?page=model_details');
}

// requette BDD affichage des commnetaires 
$sqlRead = "SELECT users.name AS name, users.isConceptor AS isConceptor ,comments.* FROM `comments`
INNER JOIN `users` ON users.id = comments.id_2 
WHERE id_1 = :id_1  
ORDER BY commentDate DESC 
;";
$statementRead = $connection->prepare($sqlRead);
$statementRead->bindValue(':id_1', $_GET['id'], PDO::PARAM_INT);
$statementRead->execute();
$statementRead->setFetchMode(PDO::FETCH_CLASS, Comment::class);
$comments = $statementRead->fetchAll();

$sqlUser = "UPDATE `comments` 
    INNER JOIN users ON users.id = comments.id_2 
    SET `isRead`= 1 
    WHERE id_1 = :idModel
    AND users.isConceptor != :isConceptor
    ;";
$statementUser = $connection->prepare($sqlUser);
$statementUser->bindValue(':idModel', $_GET['id'], PDO::PARAM_INT);
$statementUser->bindValue(':isConceptor', $_SESSION['user']->getIsConceptor(), PDO::PARAM_INT);
$statementUser->execute();

?>

<section id="model-details" class="container">
    <h2 class="mt-3 mb-5">Page Modèle</h2>
    <form method="post" class="row gap-4">
        <div class="col-9">
            <h3> Nom modèle:
                <?= $models->getName(); ?>
            </h3>
            <h3> Type modèle:
                <?php
                if ($models->getIsDesktop() == 1) {
                    echo "Tour";
                } else {
                    echo "Ordinateur portable";
                }
                ;
                ?>
            </h3>
            <?php if ($_SESSION['user']->getIsConceptor() == 0) {
                echo '<a href="?page=list_models&modelAdded=succes" class="btn btn-dark">Modèle monté</a>';
            
                ?>
            <?php } ?>
        </div>
        <table>
            <tr>
                <th>Nom pièce</th>
                <th>Catégorie pièce</th>
                <th>Quantité</th>
            </tr>
            <?php foreach ($pieces as $piece) { ?>
                <tr>
                    <td>
                        <?= $piece->getName(); ?>
                    </td>
                    <td>
                        <?= $piece->getCategory(); ?>
                    </td>
                    <td>
                        <?= $piece->getQuantity(); ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <ul>
            <?php foreach ($comments as $comment) { ?>

                <li>
                    <h4>
                        <?= $comment->getComment(); ?>
                    </h4>
                    <h6 class="">Utilisateur:
                        <?= $comment->getName(); ?> / date:
                        <?= $comment->getCommentDate(); ?>
                    </h6>
                    <hr>
                    <?php
                    if ($comment->getIsRead() == 0) {
                        echo "Non lu";
                    } else {
                        echo "Lu";
                    }
                    ?>
                </li>
            <?php } ?>
        </ul>
        <div class="form-group ">
            <label for="comment" class="mb-2">Commentaires</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-dark m-auto w-25">Valider</button>
    </form>

</section>