<?php

$rams = [
    (new Ram())
        ->setName('Corsair Vengeance LPX Series Low Profile')
        ->setBrand('Corsair')
        ->setBuyingPrice(237.95)
        ->setQuantity(17)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Kit Dual Channel 2 barrettes de RAM DDR4 PC4-25600 - CMK64GX4M2E3200C16')
        ->setCapacity(64)
        ->setDetails('CMK64GX4M2E3200C16')
        ->setBarsNumber(2),
    (new Ram())
        ->setName('Kingston FURY Beast 32 Go ')
        ->setBrand('Kingston ')
        ->setBuyingPrice(159.95)
        ->setQuantity(3)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Kingston FURY Beast 32 Go (2 x 16 Go) DDR5 5600 MHz CL40')
        ->setCapacity(16)
        ->setDetails('Kingston FURY Beast 32 Go (2 x 16 Go) DDR5 5600 MHz CL4 DDR5 5600 MHz')
        ->setBarsNumber(2),
    (new Ram())
        ->setName('G.Skill NT')
        ->setBrand('MSI')
        ->setBuyingPrice(48.95)
        ->setQuantity(6)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('Kit Dual Channel DDR3 PC3-12800 - F3-1600C11D-16GNT')
        ->setCapacity(8)
        ->setDetails('G.Skill NT Series 16 Go (2 x 8 Go) DDR3 1600 MHz CL11')
        ->setBarsNumber(2),
    (new Ram())
        ->setName('G.Skill NT ')
        ->setBrand('G.Skill')
        ->setBuyingPrice(15.25)
        ->setQuantity(8)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Le processeur AMD Ryzen 5 5600X est taillé pour le jeu vidéo : 6 Cores, 12 Threads et GameCache 35 Mo.')
        ->setCapacity(4)
        ->setDetails('G.Skill NT Series 4 Go DDR3 1333 MHz')
        ->setBarsNumber(1),
];

$insertRam = "INSERT INTO `ram` (`id`,`capacity`, `details`,`barsNumber`) VALUES (:id,:capacity, :details, :barsNumber);";

$statementRam = $connection->prepare($insertRam);

foreach ($rams as $ram) {
    $statement->bindValue(':name', $ram->getName(), PDO::PARAM_STR);
    $statement->bindValue(':buyingPrice', $ram->getBuyingPrice() * 100, PDO::PARAM_INT);
    $statement->bindValue(':isArchived', $ram->getIsArchived(), PDO::PARAM_BOOL);
    $statement->bindValue(':description', $ram->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(':brand', $ram->getBrand(), PDO::PARAM_STR);
    $statement->bindValue(':quantity', $ram->getQuantity(), PDO::PARAM_INT);
    $statement->bindValue(':isDesktop', $ram->getIsDesktop(), PDO::PARAM_BOOL);

    $statement->execute();

    $statementRam->bindValue(':id', $connection->lastInsertId(), PDO::PARAM_INT);
    $statementRam->bindValue(':capacity', $ram->getCapacity(), PDO::PARAM_INT);
    $statementRam->bindValue(':details', $ram->getDetails(), PDO::PARAM_STR);
    $statementRam->bindValue(':barsNumber', $ram->getBarsNumber(), PDO::PARAM_INT);

    $statementRam->execute();
}

?>