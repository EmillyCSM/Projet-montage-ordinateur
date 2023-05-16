<?php












  // } else {
    //     // Insertion des informations en BdD 
    //     $insertPiece = "UPDATE `piece`(`name`, `brand`, `buyingPrice`, `quantity`, `isDesktop`, `isArchived`, `description`, `category`) VALUES (:name, :brand, :buyingPrice, :quantity, :isDesktop, :isArchived, :description, :category);";
    //     $statement = $connection->prepare($insertPiece);

    //     $statement->bindValue(':name', $piece->getName(), PDO::PARAM_STR);
    //     $statement->bindValue(':brand', $piece->getBrand(), PDO::PARAM_STR);
    //     $statement->bindValue(':buyingPrice', $piece->getBuyingPrice() * 100, PDO::PARAM_INT);
    //     $statement->bindValue(':quantity', $piece->getQuantity(), PDO::PARAM_INT);
    //     $statement->bindValue(':isDesktop', $piece->getIsDesktop(), PDO::PARAM_BOOL);
    //     $statement->bindValue(':isArchived', $piece->getIsArchived(), PDO::PARAM_BOOL);
    //     $statement->bindValue(':description', $piece->getDescription(), PDO::PARAM_STR);
    //     $statement->bindValue(':category', $type, PDO::PARAM_STR);
    //     $statement->execute();
    //     // fin insertion données parent : Pièce

    //     // Récupération de l'id de la classe mère Piece
    //     $id = $connection->lastInsertId();

    //     if ($type == 'graficCard') {
    //         $insertGarficCard = "UPDATE graficcard SET (`id`,`chipset`, `memory`) VALUES (:id, :chipset, :memory);";
    //         $statementGC = $connection->prepare($insertGarficCard);

    //         $statementGC->bindValue(':id', $id, PDO::PARAM_INT);
    //         $statementGC->bindValue(':chipset', $piece->getChipset(), PDO::PARAM_STR);
    //         $statementGC->bindValue(':memory', $piece->getMemory(), PDO::PARAM_INT);

    //         $statementGC->execute();
    //     } else if ($type == 'hardDisk') {
    //         $insertHardDisk = "UPDATE `harddisk` SET (`id`, `isSSD`, `capacity`) VALUES (:id, :isSSD, :capacity)";
    //         $statementHD = $connection->prepare($insertHardDisk);

    //         $statementHD->bindValue(':id', $id, PDO::PARAM_INT);
    //         $statementHD->bindValue(':isSSD', $piece->getIsSSD(), PDO::PARAM_BOOL);
    //         $statementHD->bindValue(':capacity', $piece->getCapacity(), PDO::PARAM_INT);

    //         $statementHD->execute();
    //         // fin insertion données fille : hardDisk
    //     } else if ($type == 'keyboard') {
    //         $insertKeyboard = "UPDATE `keyboard` SET (`id`, `isWireless`, `isNumeric`, `isAzerty`) VALUES (:id, :isWireless, :isNumeric, :isAzerty);";
    //         $statementKeyboard = $connection->prepare($insertKeyboard);

    //         $statementKeyboard->bindValue(':id', $id, PDO::PARAM_INT);
    //         $statementKeyboard->bindValue(':isWireless', $piece->getIsWireless(), PDO::PARAM_BOOL);
    //         $statementKeyboard->bindValue(':isNumeric', $piece->getIsNumeric(), PDO::PARAM_BOOL);
    //         $statementKeyboard->bindValue(':isAzerty', $piece->getIsAzerty(), PDO::PARAM_BOOL);

    //         $statementKeyboard->execute();
    //         // fin insertion données fille : Keyboard
    //     } else if ($type == 'motherBoard') {
    //         $insertMotherBoard = "UPDATE `motherboard` SET (`id`, `isSocket`, `format`) VALUES (:id, :isSocket, :format)";
    //         $statementMB = $connection->prepare($insertMotherBoard);

    //         $statementMB->bindValue(':id', $id, PDO::PARAM_INT);
    //         $statementMB->bindValue(':isSocket', $piece->getIsSocket(), PDO::PARAM_BOOL);
    //         $statementMB->bindValue(':format', $piece->getFormat(), PDO::PARAM_STR);

    //         $statementMB->execute();
    //         // fin insertion données fille : MotherBoard
    //     } else if ($type == 'mouse') {
    //         $insertMouse = "UPDATE `mouse` SET (`id`,`buttonNumber`, `isWireless`) VALUES (:id,:buttonNumber, :isWireless);";
    //         $statementMouse = $connection->prepare($insertMouse);

    //         $statementMouse->bindValue(':id', $id, PDO::PARAM_INT);
    //         $statementMouse->bindValue(':buttonNumber', $piece->getButtonNumber(), PDO::PARAM_INT);
    //         $statementMouse->bindValue(':isWireless', $piece->getIsWireless(), PDO::PARAM_BOOL);

    //         $statementMouse->execute();
    //         // fin insertion données fille : Mouse
    //     } else if ($type == 'processor') {
    //         $insertProcessor = "UPDATE `processor` SET (`id`,`frequencyCPU`, `heartNumber`,`chipsetCompatibility`) VALUES (:id, :frequencyCPU, :heartNumber, :chipsetCompatibility );";
    //         $statementProcessor = $connection->prepare($insertProcessor);

    //         $statementProcessor->bindValue(':id', $id, PDO::PARAM_INT);
    //         $statementProcessor->bindValue(':frequencyCPU', $piece->getfrequencyCPU(), PDO::PARAM_INT);
    //         $statementProcessor->bindValue(':chipsetCompatibility', $piece->getChipsetCompatibility(), PDO::PARAM_STR);
    //         $statementProcessor->bindValue(':heartNumber', $piece->getHeartNumber(), PDO::PARAM_INT);

    //         $statementProcessor->execute();
    //         // fin insertion données fille : Processor
    //     } else if ($type == 'ram') {
    //         $insertRam = "UPDATE `ram` SET (`id`,`capacity`, `details`,`barsNumber`) VALUES (:id,:capacity, :details, :barsNumber);";
    //         $statementRam = $connection->prepare($insertRam);

    //         $statementRam->bindValue(':id', $id, PDO::PARAM_INT);
    //         $statementRam->bindValue(':capacity', $piece->getCapacity(), PDO::PARAM_INT);
    //         $statementRam->bindValue(':details', $piece->getDetails(), PDO::PARAM_STR);
    //         $statementRam->bindValue(':barsNumber', $piece->getBarsNumber(), PDO::PARAM_INT);

    //         $statementRam->execute();
    //         // fin insertion données fille : RAM
    //     } else if ($type == 'screen') {
    //         $insertScreen = "UPDATE `screen` SET (`id`,`size`) VALUES (:id,:size);";
    //         $statementScreen = $connection->prepare($insertScreen);

    //         $statementScreen->bindValue(':id', $id, PDO::PARAM_INT);
    //         $statementScreen->bindValue(':size', $piece->getSize(), PDO::PARAM_INT);

    //         $statementScreen->execute();
    //         // fin insertion données fille : Screen
    //     } else if ($type == 'supply') {
    //         $insertSupply = "UPDATE `supply` SET (`id`,`powerSupply`) VALUES (:id,:powerSupply);";
    //         $statementPowerSupply = $connection->prepare($insertSupply);

    //         $statementPowerSupply->bindValue(':id', $id, PDO::PARAM_INT);
    //         $statementPowerSupply->bindValue(':powerSupply', $piece->getPowerSupply(), PDO::PARAM_INT);

    //         $statementPowerSupply->execute();
    //         // fin insertion données fille : Supply
    //     }
    //     header('Location: index.php?page=list_pieces');
    // }

?>