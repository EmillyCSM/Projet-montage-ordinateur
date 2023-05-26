<?php
// requette pour recuperer les models
$sql = "SELECT name, description FROM `model`";
$statement = $connection->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_CLASS, Model::class);
$models = $statement->fetchAll();

// requette pour recuperer les piece liée à chaque modèle
$sqlPiece = "SELECT  piece.name, model.id, piece.id, piece.category FROM `compose`
INNER JOIN `piece` ON compose.`id_1` = piece.id 
INNER JOIN `model` ON model.id = compose.id ;
 ";
$statement = $connection->prepare($sqlPiece);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_CLASS, Piece::class);
$pieces = $statement->fetchAll();
?>

<section id="tab_model_mentor container">
    <h1>Tableau des modèles</h1>
    <div class="row ms-5">
        <div class="col-md-4">

            <?php foreach ($models as $model) { ?>
                <h3>Nom du modèle :
                    <?= $model->getName(); ?>
                </h3>
                <p>Description :
                    <?= $model->getDescription(); ?>
                </p>
                <table class="table table-striped">
                    <tr>
                        <th scope="col">
                            Noms pièces
                        </th>
                        <th scope="col">
                            Catégorie
                        </th>
                    </tr>
                    <?php foreach ($pieces as $piece){ ?>
                    <!-- reste la gestion de l'affichage de pieceen fonction de l'id du model -->
                        <tr scope="row">
                            <td>
                                <?= $piece->getName(); ?>
                            </td>
                            <td>
                                <?= $piece->getCategory(); ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
        </div>
    </div>
</section>