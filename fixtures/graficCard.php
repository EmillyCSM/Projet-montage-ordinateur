<?php
$category = 'graficCard';
$graficCards = [
    (new GraficCard())
        ->setName('GeForce L- 4750')
        ->setBrand('MSI')
        ->setBuyingPrice(388.00)
        ->setQuantity(4)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('La MSI GeForce RTX 4750 VENUS 8G de mémoire GDDR6 adressée via une interface large de 128 bits. La mémoire a une vitesse de 14000 MHz.')
        ->setChipset('NVIDIA GeForce RTX 4750')
        ->setMemory(10),
    (new GraficCard())
        ->setName('GeForce D- 5885')
        ->setBrand('Gigabyte')
        ->setBuyingPrice(655.99)
        ->setQuantity(4)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('La carte graphique Gigabyte GeForce RTX 5885 Vénus 12G à 3 ventilateurs à rotation alternée (WINDFORCE 3X).')
        ->setChipset('NVIDIA GeForce RTX 5885')
        ->setMemory(12),
    (new GraficCard())
        ->setName('Radeon L- 5555')
        ->setBrand('ASUS')
        ->setBuyingPrice(299.95)
        ->setQuantity(6)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('La carte graphique ASUS Radeon RX 5555 O8G OC est animée par l\'architecture RDNA 2. Elle est pourvue de 2048 processeurs de flux, 128 unités de texture et une interface mémoire 128 bits.')
        ->setChipset('AMD Radeon RX 5555')
        ->setMemory(8),
];

$insertGarficCard = "INSERT INTO graficcard (`id`,`chipset`, `memory`) VALUES (:id, :chipset, :memory);";

$statementGC = $connection->prepare($insertGarficCard);

foreach ($graficCards as $graficCard) {
    $statement->bindValue(':name', $graficCard->getName(), PDO::PARAM_STR);
    $statement->bindValue(':brand', $graficCard->getBrand(), PDO::PARAM_STR);
    $statement->bindValue(':buyingPrice', $graficCard->getBuyingPrice() * 100, PDO::PARAM_INT);
    $statement->bindValue(':quantity', $graficCard->getQuantity(), PDO::PARAM_INT);
    $statement->bindValue(':isDesktop', $graficCard->getIsDesktop(), PDO::PARAM_BOOL);
    $statement->bindValue(':isArchived', $graficCard->getIsArchived(), PDO::PARAM_BOOL);
    $statement->bindValue(':description', $graficCard->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(':category', $category, PDO::PARAM_STR);
    $statement->execute();

    $statementGC->bindValue(':id', $connection->lastInsertId(), PDO::PARAM_INT);
    $statementGC->bindValue(':chipset', $graficCard->getChipset(), PDO::PARAM_STR);
    $statementGC->bindValue(':memory', $graficCard->getMemory(), PDO::PARAM_INT);

    $statementGC->execute();
}