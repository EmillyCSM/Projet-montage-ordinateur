<?php
$category = 'motherBoard';

$motherBoards = [
    (new MotherBoard())
        ->setName('ASRock L- A520M-HVS')
        ->setBrand('ASRock')
        ->setBuyingPrice(74.95)
        ->setQuantity(7)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('Carte mère Micro ATX AMD A520 - 2x DDR4 - M.2 PCIe NVMe - 1x PCI-Express 3.0 16x')
        ->setIsSocket(0)
        ->setFormat('Micro ATX'),
    (new MotherBoard())
        ->setName('ASRock D- A620M-HVS Socket')
        ->setBrand('ASRock')
        ->setBuyingPrice(129.95)
        ->setQuantity(5)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Carte mère Micro ATX Socket AM5 AMD A620 - 2x DDR5 - M.2 PCIe 4.0 - USB 3.0 - PCI-Express 4.0 16x')
        ->setIsSocket(1)
        ->setFormat('Micro ATX'),
    (new MotherBoard())
        ->setName('OSLAN L- 425-HVS')
        ->setBrand('OSLAN')
        ->setBuyingPrice(64.95)
        ->setQuantity(7)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('Carte mère Micro ATX AMD A520 - 2x DDR4 - M.2 PCIe NVMe - 1x PCI-Express 3.0 16x')
        ->setIsSocket(0)
        ->setFormat('ATX'),
    (new MotherBoard())
        ->setName('OSLAN D- A620M-HVS Socket')
        ->setBrand('OSLAN')
        ->setBuyingPrice(199.95)
        ->setQuantity(4)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Carte mère ATX Socket AM4 AMD B550 - 4x DDR4 - SATA 6Gb/s + M.2 PCI-E NVMe - USB 3.1 - 1x PCI-Express 4.0 16x + 1x PCI-Express 3.0 16x - LAN 2.5 GbE')
        ->setIsSocket(1)
        ->setFormat('ATX'),
];


$insertMotherBoard = "INSERT INTO `motherboard`(`id`, `isSocket`, `format`) VALUES (:id, :isSocket, :format)";

$statementMB = $connection->prepare($insertMotherBoard);

foreach ($motherBoards as $motherBoard) {
    $statement->bindValue(':name', $motherBoard->getName(), PDO::PARAM_STR);
    $statement->bindValue(':brand', $motherBoard->getBrand(), PDO::PARAM_STR);
    $statement->bindValue(':buyingPrice', $motherBoard->getBuyingPrice() * 100, PDO::PARAM_INT);
    $statement->bindValue(':quantity', $motherBoard->getQuantity(), PDO::PARAM_INT);
    $statement->bindValue(':isDesktop', $motherBoard->getIsDesktop(), PDO::PARAM_BOOL);
    $statement->bindValue(':isArchived', $motherBoard->getIsArchived(), PDO::PARAM_BOOL);
    $statement->bindValue(':description', $motherBoard->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(':category', $category, PDO::PARAM_STR);
    $statement->execute();

    $statementMB->bindValue(':id', $connection->lastInsertId(), PDO::PARAM_INT);
    $statementMB->bindValue(':isSocket', $motherBoard->getIsSocket(), PDO::PARAM_BOOL);
    $statementMB->bindValue(':format', $motherBoard->getFormat(), PDO::PARAM_STR);

    $statementMB->execute();
}