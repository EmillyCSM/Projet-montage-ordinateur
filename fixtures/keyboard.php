<?php
$category = 'keyboard';
$keyBoards = [
    (new Keyboard())
        ->setName('Targus Clavier Bluetooth (AZERTY Français)')
        ->setBrand('Heden')
        ->setBuyingPrice(29.99)
        ->setQuantity(12)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Connexion : Bluetooth v3.0 + HS / Dimensions (L x P x H) : 286 x 121 x 22.4 mm')
        ->setIsWireless(1)
        ->setIsNumeric(0)
        ->setIsAzerty(1),
    (new Keyboard())
        ->setName('Gustar filaire (AZERTY Français)')
        ->setBrand('Heden')
        ->setBuyingPrice(39.99)
        ->setQuantity(11)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Dimensions : 95 x 65 x 3 6mm')
        ->setIsWireless(0)
        ->setIsNumeric(1)
        ->setIsAzerty(1),
    (new Keyboard())
        ->setName('Novur Clavier Bluetooth (QWERTZ USA)')
        ->setBrand('INOVU')
        ->setBuyingPrice(19.99)
        ->setQuantity(8)
        ->setIsDesktop(1)
        ->setIsArchived(0)
        ->setDescription('Connexion : Bluetooth v3.0 + HS / Dimensions (L x P x H) : 286 x 121 x 22.4 mm')
        ->setIsWireless(1)
        ->setIsNumeric(0)
        ->setIsAzerty(0),
    (new Keyboard())
        ->setName('Freekey (QWERTZ UK)')
        ->setBrand('NUNO')
        ->setBuyingPrice(24.99)
        ->setQuantity(12)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('Modèle : W551AU UK')
        ->setIsWireless(1)
        ->setIsNumeric(0)
        ->setIsAzerty(0),
    (new Keyboard())
        ->setName('Keyfree (AZERTY Français)')
        ->setBrand('NUNO')
        ->setBuyingPrice(29.99)
        ->setQuantity(5)
        ->setIsDesktop(0)
        ->setIsArchived(0)
        ->setDescription('Modèle : KB-CH-SATURNES')
        ->setIsWireless(1)
        ->setIsNumeric(1)
        ->setIsAzerty(1),
];

$insertKeyboard = "INSERT INTO `keyboard`(`id`, `isWireless`, `isNumeric`, `isAzerty`) VALUES (:id, :isWireless, :isNumeric, :isAzerty);";

$statementKeyboard = $connection->prepare($insertKeyboard);

foreach ($keyBoards as $keyboard) {
    $statement->bindValue(':name', $keyboard->getName(), PDO::PARAM_STR);
    $statement->bindValue(':brand', $keyboard->getBrand(), PDO::PARAM_STR);
    $statement->bindValue(':buyingPrice', $keyboard->getBuyingPrice() * 100, PDO::PARAM_INT);
    $statement->bindValue(':quantity', $keyboard->getQuantity(), PDO::PARAM_INT);
    $statement->bindValue(':isDesktop', $keyboard->getIsDesktop(), PDO::PARAM_BOOL);
    $statement->bindValue(':isArchived', $keyboard->getIsArchived(), PDO::PARAM_BOOL);
    $statement->bindValue(':description', $keyboard->getDescription(), PDO::PARAM_STR);
    $statement->bindValue(':category', $category, PDO::PARAM_STR);
    $statement->execute();
    // fin insertion données parent : Pièce
    $statementKeyboard->bindValue(':id', $connection->lastInsertId(), PDO::PARAM_INT);
    $statementKeyboard->bindValue(':isWireless', $keyboard->getIsWireless(), PDO::PARAM_BOOL);
    $statementKeyboard->bindValue(':isNumeric', $keyboard->getIsNumeric(), PDO::PARAM_BOOL);
    $statementKeyboard->bindValue(':isAzerty', $keyboard->getIsAzerty(), PDO::PARAM_BOOL);


    $statementKeyboard->execute();
    // fin insertion données fille : Keyboard
}