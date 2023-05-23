<?php
$category = 'mouse';
$mouses = [
    (new Mouse())
        ->setName('Logitech L- Pro Wireless Gaming Mouse ')
        ->setBrand('Logitech')
        ->setBuyingPrice(129.95)
        ->setQuantity(50)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('Souris sans fil pour professionnel - ambidextre - capteur optique 25600 dpi - 8 boutons programmables - rétro-éclairage RGB - technologie sans fil Lightspeed')
        ->setButtonNumber(8)
        ->setIsWireless(1),
    (new Mouse())
        ->setName('Bluestork D- Wireless Ergonomic Mouse')
        ->setBrand('Bluestork ')
        ->setBuyingPrice(19.94)
        ->setQuantity(36)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Souris sans fil ergonomique - droitier - capteur 1200 dpi - 6 boutons')
        ->setButtonNumber(6)
        ->setIsWireless(1),
    (new Mouse())
        ->setName('be quiet D-')
        ->setBrand('Be Quiet !')
        ->setBuyingPrice(69.94)
        ->setQuantity(40)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Souris ergonomique avec trackball, sans fil, rechargeable, Bluetooth - droitier - capteur 1600 dpi - 5 boutons')
        ->setButtonNumber(5)
        ->setIsWireless(1),
    (new Mouse())
        ->setName('Perixx L- PERIPAD-504 Touchpad filaire')
        ->setBrand('perixx')
        ->setBuyingPrice(34.94)
        ->setQuantity(30)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('perixx PERIPAD-504 Touchpad filaire - USB - 120x90x19 mm - Fonction de Défilement et de pointage')
        ->setButtonNumber(2)
        ->setIsWireless(0),
];

$insertMouse = "INSERT INTO `mouse` (`id`,`buttonNumber`, `isWireless`) VALUES (:id,:buttonNumber, :isWireless);";

$statementMouse = $connection->prepare($insertMouse);

foreach ($mouses as $mouse) {
    $statement->bindValue(':name', $mouse->getName(), PDO::PARAM_STR);
    $statement->bindValue(':buyingPrice', $mouse->getBuyingPrice() * 100, PDO::PARAM_INT);
    $statement->bindValue(':isArchived', $mouse->getIsArchived(), PDO::PARAM_BOOL);
    $statement->bindValue(':description', $mouse->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(':brand', $mouse->getBrand(), PDO::PARAM_STR);
    $statement->bindValue(':quantity', $mouse->getQuantity(), PDO::PARAM_INT);
    $statement->bindValue(':isDesktop', $mouse->getIsDesktop(), PDO::PARAM_BOOL);
    $statement->bindValue(':category', $category, PDO::PARAM_STR);

    $statement->execute();

    $statementMouse->bindValue(':id', $connection->lastInsertId(), PDO::PARAM_INT);
    $statementMouse->bindValue(':buttonNumber', $mouse->getButtonNumber(), PDO::PARAM_INT);
    $statementMouse->bindValue(':isWireless', $mouse->getIsWireless(), PDO::PARAM_BOOL);

    $statementMouse->execute();
}


?>