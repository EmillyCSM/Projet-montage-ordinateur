<?php
spl_autoload_register(function ($class) {
    require_once "../classes/$class.php";
});

require_once '../includes/db.inc.php';

$connection->exec('
SET FOREIGN_KEY_CHECKS=0;
TRUNCATE TABLE `computer_assembly`.`piece`;
TRUNCATE TABLE `computer_assembly`.`graficcard`;
TRUNCATE TABLE `computer_assembly`.`hardDisk`;
TRUNCATE TABLE `computer_assembly`.`keyboard`;
TRUNCATE TABLE `computer_assembly`.`motherboard`;
TRUNCATE TABLE `computer_assembly`.`mouse`;
TRUNCATE TABLE `computer_assembly`.`processor`;
TRUNCATE TABLE `computer_assembly`.`ram`;
TRUNCATE TABLE `computer_assembly`.`screen`;
TRUNCATE TABLE `computer_assembly`.`supply`;
TRUNCATE TABLE `computer_assembly`.`users`;
SET FOREIGN_KEY_CHECKS=1;
'); // Pour effacer la table précedente avant d'ajouter la nouvelle. 

$insertPiece = "INSERT INTO `piece`(`name`, `brand`, `buyingPrice`, `quantity`, `isDesktop`, `isArchived`, `description`) VALUES (:name, :brand, :buyingPrice, :quantity, :isDesktop, :isArchived, :description);";
$statement = $connection->prepare($insertPiece);

include 'graficCard.php';
include 'hardDisk.php';
include 'keyboard.php';
include 'motherboard.php';
include 'mouse.php';
include 'processor.php';
include 'ram.php';
include 'screen.php';
include 'supply.php';
include 'user.php';