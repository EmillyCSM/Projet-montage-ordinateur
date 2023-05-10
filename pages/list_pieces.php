<?php
$sql = "SELECT * FROM `piece`;";

$statement = $connection->prepare($sql);

$statement->execute();
$statement->setFetchMode(PDO::FETCH_CLASS, Piece::class);
$results = $statement->fetchAll();


?>



<table>
    <tr>
        <th>nom de la pièce</th>
        <th>marque</th>
        <th>quantité en stock</th>
        <th>prix</th>
        <th>nombre de modèles créés avec cette pièce</th>
        <th>catégories</th>
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
                <?php echo $result->getBuyingPrice(); ?>
            </td>
            <td>
                <?php 0 ?>
            </td>
            <td>
                <?php echo $result->getIsDesktop(); ?>
            </td>
        </tr>
    <?php } ?>

</table>