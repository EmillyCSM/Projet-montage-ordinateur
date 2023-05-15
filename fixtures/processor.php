<?php
$category = 'processor';
$processors = [
    (new Processor())
        ->setfrequencyCPU("3.7")
        ->setChipsetCompatibility("AMD B550, AMD X570")
        ->setHeartNumber(6)
        ->setName('AMD Ryzen 5 5600X Wraith Stealth')
        ->setBrand('MSI')
        ->setBuyingPrice(212.95)
        ->setQuantity(8)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Le processeur AMD Ryzen 5 5600X est taillé pour le jeu vidéo : 6 Cores, 12 Threads et GameCache 35 Mo.'),
    (new Processor())
        ->setfrequencyCPU(3.5)
        ->setChipsetCompatibility(' Intel B660 Express,
    Intel H610 Express,
    Intel H670 Express,
    Intel Z690 Express,
    Intel Z790 Express,
    Intel B760 Express,
    Intel H770 Express')
        ->setHeartNumber(14)
        ->setName('Intel Core i5-13600KF')
        ->setBrand('intel')
        ->setBuyingPrice(385.96)
        ->setQuantity(4)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Processeur 14-Core (6 Performance-Cores + 8 Efficient-Cores) 20-Threads Socket 1700 Cache L3 24 Mo 0.010 micron '),
    (new Processor())
        ->setfrequencyCPU(3.8)
        ->setChipsetCompatibility('AMD A520,
        AMD B550,
        AMD X570')
        ->setHeartNumber(8)
        ->setName('GeForce RTX 4750')
        ->setBrand('MSI')
        ->setBuyingPrice(388.00)
        ->setQuantity(4)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('La MSI GeForce RTX 4750 VENUS 8G de mémoire GDDR6 adressée via une interface large de 128 bits. La mémoire a une vitesse de 14000 MHz.'),
    (new Processor())
        ->setfrequencyCPU(3.7)
        ->setChipsetCompatibility('AMD A520,
    AMD B550,
    AMD X570 ')
        ->setHeartNumber(6)
        ->setName('AMD Ryzen 5 PRO 4650G')
        ->setBrand('AMD')
        ->setBuyingPrice(219.95)
        ->setQuantity(5)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('Processeur 6-Core 12-Threads socket AM4 Cache L3 8 Mo Radeon Vega 7 Graphics TDP 65W '),
];

$insertProcessor = "INSERT INTO `processor` (`id`,`frequencyCPU`, `heartNumber`,`chipsetCompatibility`) VALUES (:id, :frequencyCPU, :heartNumber, :chipsetCompatibility );";

$statementProcessor = $connection->prepare($insertProcessor);

foreach ($processors as $processor) {
    $statement->bindValue(':name', $processor->getName(), PDO::PARAM_STR);
    $statement->bindValue(':buyingPrice', $processor->getBuyingPrice() * 100, PDO::PARAM_INT);
    $statement->bindValue(':isArchived', $processor->getIsArchived(), PDO::PARAM_BOOL);
    $statement->bindValue(':description', $processor->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(':brand', $processor->getBrand(), PDO::PARAM_STR);
    $statement->bindValue(':quantity', $processor->getQuantity(), PDO::PARAM_INT);
    $statement->bindValue(':isDesktop', $processor->getIsDesktop(), PDO::PARAM_BOOL);
    $statement->bindValue(':category', $category, PDO::PARAM_STR);

    $statement->execute();

    $statementProcessor->bindValue(':id', $connection->lastInsertId(), PDO::PARAM_INT);
    $statementProcessor->bindValue(':frequencyCPU', $processor->getfrequencyCPU(), PDO::PARAM_INT);
    $statementProcessor->bindValue(':chipsetCompatibility', $processor->getChipsetCompatibility(), PDO::PARAM_STR);
    $statementProcessor->bindValue(':heartNumber', $processor->getHeartNumber(), PDO::PARAM_INT);

    $statementProcessor->execute();
}

?>