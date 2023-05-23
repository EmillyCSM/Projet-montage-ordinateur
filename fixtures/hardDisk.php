<?php
$category = 'hardDisk';
$hardDisks = [
    (new HardDisk())
        ->setName('Jupiter L- 304 1 To')
        ->setBrand('Toshiba')
        ->setBuyingPrice(59.95)
        ->setQuantity(6)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('Le disque dur pour PC portable 2.5" (L 69.85mm, H 7mm, P 100mm), poids 117 g.')
        ->setIsSSD(0)
        ->setCapacity(1000),
    (new HardDisk())
        ->setName('Neptune D- 58 4 To')
        ->setBrand('Seagate Technology')
        ->setBuyingPrice(199.59)
        ->setQuantity(8)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Le disque dur pour PC portable 2.5" (L 69.85mm, H 15mm, P 100.35mm), poids 190 g.')
        ->setIsSSD(0)
        ->setCapacity(4000),
    (new HardDisk())
        ->setName('Jupiter L- 484 2 To')
        ->setBrand('Toshiba')
        ->setBuyingPrice(89.95)
        ->setQuantity(7)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('Le disque dur pour PC portable 2.5" (L 69.85mm, H 9.5mm, P 100mm), poids 117 g.')
        ->setIsSSD(0)
        ->setCapacity(2000),
    (new HardDisk())
        ->setName('Mercure D- SSD 1 To')
        ->setBrand('Samsung')
        ->setBuyingPrice(124.99)
        ->setQuantity(6)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Taille (L 22mm, H 2.38mm, P 80mm).')
        ->setIsSSD(1)
        ->setCapacity(1000),
    (new HardDisk())
        ->setName('Vénus L- SSD 960 Go')
        ->setBrand('Samsung')
        ->setBuyingPrice(85.55)
        ->setQuantity(8)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('Le disque dur pour PC portable 2.5" (L 69.9mm, H 7mm, P 100mm), poids 41 g.')
        ->setIsSSD(1)
        ->setCapacity(960),
];

$insertHardDisk = "INSERT INTO `harddisk`(`id`, `isSSD`, `capacity`) VALUES (:id, :isSSD, :capacity)";
$statementHD = $connection->prepare($insertHardDisk);

foreach ($hardDisks as $hardDisk) {
    $statement->bindValue(':name', $hardDisk->getName(), PDO::PARAM_STR);
    $statement->bindValue(':brand', $hardDisk->getBrand(), PDO::PARAM_STR);
    $statement->bindValue(':buyingPrice', $hardDisk->getBuyingPrice() * 100, PDO::PARAM_INT);
    $statement->bindValue(':quantity', $hardDisk->getQuantity(), PDO::PARAM_INT);
    $statement->bindValue(':isDesktop', $hardDisk->getIsDesktop(), PDO::PARAM_BOOL);
    $statement->bindValue(':isArchived', $hardDisk->getIsArchived(), PDO::PARAM_BOOL);
    $statement->bindValue(':description', $hardDisk->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(':category', $category, PDO::PARAM_STR);
    $statement->execute();
    // fin insertion données parent : Pièce
    $statementHD->bindValue(':id', $connection->lastInsertId(), PDO::PARAM_INT);
    $statementHD->bindValue(':isSSD', $hardDisk->getIsSSD(), PDO::PARAM_BOOL);
    $statementHD->bindValue(':capacity', $hardDisk->getCapacity(), PDO::PARAM_INT);

    $statementHD->execute();
    // fin insertion données fille : hardDisk
}