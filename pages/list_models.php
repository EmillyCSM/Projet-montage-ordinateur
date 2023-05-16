<?php
$sqlModel = "SELECT * FROM `model`";

$statement = $connection->prepare($sqlModel);

$statement->execute();
$statement->setFetchMode(PDO::FETCH_CLASS, Model::class);
$results = $statement->fetchAll();
?>

<section id="model_table" class="container">
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