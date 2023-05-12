<?php

$supplys = [
    (new Supply())
        ->setName('be quiet')
        ->setBrand('Be Quiet !')
        ->setBuyingPrice(144.94)
        ->setQuantity(30)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Alimentation 100% modulaire 850W ATX12V 3.0 / EPS12V - 80PLUS Gold')
        ->setPowerSupply(850),
    (new Supply())
        ->setName('Aerocool LUX RGB 750M')
        ->setBrand('Aerocool')
        ->setBuyingPrice(99.94)
        ->setQuantity(10)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Alimentation semi-modulaire 750W ATX/EPS 12V - 80PLUS Bronze')
        ->setPowerSupply(750),
    (new Supply())
        ->setName('be quiet! Straight Power 11 1000W 80PLUS Platinum ')
        ->setBrand('Be quiet!')
        ->setBuyingPrice(223.94)
        ->setQuantity(7)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Alimentation modulaire 1000W ATX 12V 2.51/EPS 12V 2.92')
        ->setPowerSupply(1000),
    (new Supply())
        ->setName('Corsair HX750 80PLUS Platinum ')
        ->setBrand('Corsair')
        ->setBuyingPrice(179.95)
        ->setQuantity(18)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Alimentation modulaire semi-passive 750W ATX 12V 2.4/EPS 12V - 80PLUS Platinum')
        ->setPowerSupply(750),
];

$insertSupply = "INSERT INTO `supply` (`id`,`powerSupply`) VALUES (:id,:powerSupply);";

$statementPowerSupply = $connection->prepare($insertSupply);

foreach ($supplys as $supply) {
    $statement->bindValue(':name', $supply->getName(), PDO::PARAM_STR);
    $statement->bindValue(':buyingPrice', $supply->getBuyingPrice() * 100, PDO::PARAM_INT);
    $statement->bindValue(':isArchived', $supply->getIsArchived(), PDO::PARAM_BOOL);
    $statement->bindValue(':description', $supply->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(':brand', $supply->getBrand(), PDO::PARAM_STR);
    $statement->bindValue(':quantity', $supply->getQuantity(), PDO::PARAM_INT);
    $statement->bindValue(':isDesktop', $supply->getIsDesktop(), PDO::PARAM_BOOL);

    $statement->execute();

    $statementPowerSupply->bindValue(':id', $connection->lastInsertId(), PDO::PARAM_INT);
    $statementPowerSupply->bindValue(':powerSupply', $supply->getPowerSupply(), PDO::PARAM_INT);

    $statementPowerSupply->execute();

}

?>