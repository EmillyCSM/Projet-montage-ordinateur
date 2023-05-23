<?php
$category = 'screen';

$screens = [
    (new Screen())
        ->setName('Lenovo D- ThinkVision')
        ->setBrand('Lenovo')
        ->setBuyingPrice(319.94)
        ->setQuantity(20)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('1920 x 1200 pixels - 4 ms (gris à gris) - Format 16/10 - Dalle IPS - Pivot - HDMI/DisplayPort/USB-C - Hub USB 3.0 - Haut-parleurs - Noir')
        ->setSize(27),
    (new Screen())
        ->setName('UltraGear L- 27GP850P-B ')
        ->setBrand('LG')
        ->setBuyingPrice(329.95)
        ->setQuantity(10)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('2560 x 1440 pixels - 1 ms (gris à gris) - Format 16/9 - Dalle Nano-IPS - 165 Hz (180 Hz OC) - DisplayHDR 400 - Compatible G-Sync / FreeSync Premium - HDMI/DisplayPort - Hub USB 3.0 - Pivot - Noir')
        ->setSize(17),
    (new Screen())
        ->setName('ROG D- PG27AQDM ')
        ->setBrand('ASUS')
        ->setBuyingPrice(1199.95)
        ->setQuantity(9)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('2560 x 1440 pixels - 0.03 ms (gris à gris) - Format 16/9 - Dalle OLED - 240 Hz - NVIDIA G-SYNC Compatible / FreeSync Premium - HDR10 - DisplayPort/HDMI - Noir')
        ->setSize(27),
    (new Screen())
        ->setName('ViewSonic D- ')
        ->setBrand('ViewSonic ')
        ->setBuyingPrice(249.95)
        ->setQuantity(26)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('2560 x 1440 pixels - 4 ms (gris à gris) - 16/9 - IPS - HDR10 - 75 Hz - HDMI/DisplayPort - Haut-parleurs - Noir')
        ->setSize(31),
];

$insertScreen = "INSERT INTO `screen` (`id`,`size`) VALUES (:id,:size);";

$statementScreen = $connection->prepare($insertScreen);

foreach ($screens as $screen) {
    $statement->bindValue(':name', $screen->getName(), PDO::PARAM_STR);
    $statement->bindValue(':buyingPrice', $screen->getBuyingPrice() * 100, PDO::PARAM_INT);
    $statement->bindValue(':isArchived', $screen->getIsArchived(), PDO::PARAM_BOOL);
    $statement->bindValue(':description', $screen->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(':brand', $screen->getBrand(), PDO::PARAM_STR);
    $statement->bindValue(':quantity', $screen->getQuantity(), PDO::PARAM_INT);
    $statement->bindValue(':isDesktop', $screen->getIsDesktop(), PDO::PARAM_BOOL);
    $statement->bindValue(':category', $category, PDO::PARAM_STR);

    $statement->execute();

    $statementScreen->bindValue(':id', $connection->lastInsertId(), PDO::PARAM_INT);
    $statementScreen->bindValue(':size', $screen->getSize(), PDO::PARAM_INT);

    $statementScreen->execute();
}


?>