-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 11 mai 2023 à 11:36
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `computer_assembly`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `commentDate` date DEFAULT NULL,
  `isRead` tinyint(1) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_general_ci,
  `id_1` int NOT NULL,
  `id_2` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Comments_Model_1_FK` (`id_1`),
  KEY `Comments_Users_2_FK` (`id_2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compose`
--

DROP TABLE IF EXISTS `compose`;
CREATE TABLE IF NOT EXISTS `compose` (
  `id` int NOT NULL,
  `id_1` int NOT NULL,
  PRIMARY KEY (`id`,`id_1`),
  KEY `compose_Piece_1_FK` (`id_1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `graficcard`
--

DROP TABLE IF EXISTS `graficcard`;
CREATE TABLE IF NOT EXISTS `graficcard` (
  `id` int NOT NULL,
  `chipset` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `memory` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `harddisk`
--

DROP TABLE IF EXISTS `harddisk`;
CREATE TABLE IF NOT EXISTS `harddisk` (
  `id` int NOT NULL,
  `isSSD` tinyint(1) DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `keyboard`
--

DROP TABLE IF EXISTS `keyboard`;
CREATE TABLE IF NOT EXISTS `keyboard` (
  `id` int NOT NULL,
  `isWireless` tinyint(1) DEFAULT NULL,
  `isNumeric` tinyint(1) DEFAULT NULL,
  `isAzerty` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isDesktop` tinyint(1) DEFAULT NULL,
  `computerCreationNumber` int DEFAULT NULL,
  `addDate` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `id_1` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Model_AK` (`name`),
  KEY `Model_Users_1_FK` (`id_1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `motherboard`
--

DROP TABLE IF EXISTS `motherboard`;
CREATE TABLE IF NOT EXISTS `motherboard` (
  `id` int NOT NULL,
  `isSocket` tinyint(1) DEFAULT NULL,
  `format` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mouse`
--

DROP TABLE IF EXISTS `mouse`;
CREATE TABLE IF NOT EXISTS `mouse` (
  `id` int NOT NULL,
  `isWireless` tinyint(1) DEFAULT NULL,
  `buttonNumber` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `buyingPrice` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `isDesktop` tinyint(1) DEFAULT NULL,
  `isArchived` tinyint(1) DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `category` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `processor`
--

DROP TABLE IF EXISTS `processor`;
CREATE TABLE IF NOT EXISTS `processor` (
  `id` int NOT NULL,
  `frequencyCPU` decimal(15,2) DEFAULT NULL,
  `heartNumber` int DEFAULT NULL,
  `chipsetCompatibility` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ram`
--

DROP TABLE IF EXISTS `ram`;
CREATE TABLE IF NOT EXISTS `ram` (
  `id` int NOT NULL,
  `capacity` int DEFAULT NULL,
  `barsNumber` int DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `screen`
--

DROP TABLE IF EXISTS `screen`;
CREATE TABLE IF NOT EXISTS `screen` (
  `id` int NOT NULL,
  `size` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stockhistory`
--

DROP TABLE IF EXISTS `stockhistory`;
CREATE TABLE IF NOT EXISTS `stockhistory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `creationDate` date DEFAULT NULL,
  `isEnter` tinyint(1) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `id_1` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `StockHistory_Piece_1_FK` (`id_1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `supply`
--

DROP TABLE IF EXISTS `supply`;
CREATE TABLE IF NOT EXISTS `supply` (
  `id` int NOT NULL,
  `powerSupply` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isConceptor` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Comments_Model_1_FK` FOREIGN KEY (`id_1`) REFERENCES `model` (`id`),
  ADD CONSTRAINT `Comments_Users_2_FK` FOREIGN KEY (`id_2`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `compose`
--
ALTER TABLE `compose`
  ADD CONSTRAINT `compose_Model_FK` FOREIGN KEY (`id`) REFERENCES `model` (`id`),
  ADD CONSTRAINT `compose_Piece_1_FK` FOREIGN KEY (`id_1`) REFERENCES `piece` (`id`);

--
-- Contraintes pour la table `graficcard`
--
ALTER TABLE `graficcard`
  ADD CONSTRAINT `GraficCard_Piece_FK` FOREIGN KEY (`id`) REFERENCES `piece` (`id`);

--
-- Contraintes pour la table `harddisk`
--
ALTER TABLE `harddisk`
  ADD CONSTRAINT `HardDisk_Piece_FK` FOREIGN KEY (`id`) REFERENCES `piece` (`id`);

--
-- Contraintes pour la table `keyboard`
--
ALTER TABLE `keyboard`
  ADD CONSTRAINT `keyboard_Piece_FK` FOREIGN KEY (`id`) REFERENCES `piece` (`id`);

--
-- Contraintes pour la table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `Model_Users_1_FK` FOREIGN KEY (`id_1`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `motherboard`
--
ALTER TABLE `motherboard`
  ADD CONSTRAINT `MotherBoard_Piece_FK` FOREIGN KEY (`id`) REFERENCES `piece` (`id`);

--
-- Contraintes pour la table `mouse`
--
ALTER TABLE `mouse`
  ADD CONSTRAINT `Mouse_Piece_FK` FOREIGN KEY (`id`) REFERENCES `piece` (`id`);

--
-- Contraintes pour la table `processor`
--
ALTER TABLE `processor`
  ADD CONSTRAINT `Processor_Piece_FK` FOREIGN KEY (`id`) REFERENCES `piece` (`id`);

--
-- Contraintes pour la table `ram`
--
ALTER TABLE `ram`
  ADD CONSTRAINT `RAM_Piece_FK` FOREIGN KEY (`id`) REFERENCES `piece` (`id`);

--
-- Contraintes pour la table `screen`
--
ALTER TABLE `screen`
  ADD CONSTRAINT `Screen_Piece_FK` FOREIGN KEY (`id`) REFERENCES `piece` (`id`);

--
-- Contraintes pour la table `stockhistory`
--
ALTER TABLE `stockhistory`
  ADD CONSTRAINT `StockHistory_Piece_1_FK` FOREIGN KEY (`id_1`) REFERENCES `piece` (`id`);

--
-- Contraintes pour la table `supply`
--
ALTER TABLE `supply`
  ADD CONSTRAINT `Supply_Piece_FK` FOREIGN KEY (`id`) REFERENCES `piece` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
