-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 31 mars 2021 à 07:22
-- Version du serveur :  8.0.21
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'Josef.jojo@gmail.com', '$2y$10$tMbXBRi1jTlfcNvyFHQIgOC1S80ZuEQ2g8PB6kaVwc0CYbhYzE4lO'),
(2, 'adam.fraga@live.fr', '$2y$10$ETbt0antXOZqJLWKQwwtzuIt5sk3afMl4/N.p5aUOaH1kyZzkbQ0i');

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

DROP TABLE IF EXISTS `adresses`;
CREATE TABLE IF NOT EXISTS `adresses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_client` int NOT NULL,
  `numero` int NOT NULL,
  `rue` varchar(100) NOT NULL,
  `complement` varchar(100) NOT NULL,
  `code_postal` int NOT NULL,
  `ville` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `adresses`
--

INSERT INTO `adresses` (`id`, `id_client`, `numero`, `rue`, `complement`, `code_postal`, `ville`) VALUES
(1, 1, 50, 'Rue Montauband', '', 13000, 'Marseille'),
(2, 2, 16, 'Avenue Longchamps', 'F', 95300, 'Paris'),
(3, 3, 50, 'Madrague de Wellington', '', 2450, 'Orlã©ans'),
(4, 4, 627, 'boulevard du connÃ©table', 'H1', 70600, 'Cuges-les-pins'),
(5, 5, 4, 'Rue de l\'ame perdue', 'Batiment F', 2450, 'Arrieges'),
(6, 6, 1, 'Rue des chambellans', '4A', 27095, 'Aubagne'),
(7, 7, 45, 'Rue des coquelicots', 'A1', 62957, 'Reims'),
(8, 8, 25, 'Boulevard des accacias', 'A', 18750, 'Lille'),
(9, 9, 18, 'Bd des cerisiers', '', 69280, 'Tours'),
(10, 10, 520, 'Avenue du Marechal Ferrain', 'F', 93200, 'Chartreux'),
(11, 11, 25, 'Av montmartre', 'E', 93257, 'Cergy-pontoise'),
(24, 24, 627, 'Avenue du Marechal Ferrain', '', 13008, 'Marseille'),
(25, 25, 12, 'Avenue Montgrand', 'A2', 13000, 'Azaza'),
(28, 28, 45, 'Rue des coquelicots', '', 62957, 'Menton');

-- --------------------------------------------------------

--
-- Structure de la table `caracteristiques`
--

DROP TABLE IF EXISTS `caracteristiques`;
CREATE TABLE IF NOT EXISTS `caracteristiques` (
  `Diamètre` float NOT NULL,
  `Épaisseur` float NOT NULL,
  `Boitier` text NOT NULL,
  `Mouvement` text NOT NULL,
  `Reserve` text NOT NULL,
  `Étanchéité` text NOT NULL,
  `produit` int NOT NULL,
  UNIQUE KEY `produit` (`produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `caracteristiques`
--

INSERT INTO `caracteristiques` (`Diamètre`, `Épaisseur`, `Boitier`, `Mouvement`, `Reserve`, `Étanchéité`, `produit`) VALUES
(40, 14.6, 'Bi-ton or rose & acier', 'Calibre Audemars Piguet 4409', '70 heures', '20m', 1),
(32, 14.3, 'Fond saphir', '4302', '70 heures', '30m', 2),
(39, 7, 'Or gris 18 carats', 'Automatique', '60 heures', 'Non', 3),
(39.5, 9.8, 'Or rose', 'Mécanique à remontage manuel', '49 heures', '20m', 4),
(42, 12.8, 'Titane', 'Mécanique à remontage automatique', '40 heures', '100m', 5),
(30.9, 6.24, 'Acier fond saphir', 'Mécanique à remontage automatique', '65 heures', '50m', 6),
(43.6, 13.83, 'Ceramic', 'Automatique', '120 heures', '300m', 7),
(43, 16, 'Titane', 'Automatique', '110 heures', '150m', 8),
(40.3, 13.23, 'Lunette erre fond saphir', 'Automatique', 'NC', '300m', 9),
(45, 17.2, 'Acier Verre Saphir', 'Remontage automatique', '40 heures', '300m', 10),
(45, 15.5, 'Acier', 'Remontage automatique', '50 heures', '200m', 11),
(45, 14.7, 'Or blanc', 'Remontage automatique', 'NC', '300m', 12),
(42.5, 21, 'Ceramique noir verre saphir', 'Automatique', 'NC', '50m', 13),
(39, 20, 'Acier verre saphir', 'Automatique', 'NC', '100m', 14),
(41, 20, 'Acier verre saphir', 'Automatique', 'NC', '100m', 15),
(34, 20, 'Or rouge verre saphir', 'Automatique', 'NC', '100m', 16),
(39.8, 19, 'Acier verre saphir', 'Automatique', 'NC', '30m', 17),
(42, 20, 'Acier verre saphir', 'Automatique', 'NC', '600m', 18);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `id_mail` int NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authkey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mail` (`id_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `id_mail`, `telephone`, `password`, `authkey`) VALUES
(1, 'Jane', 'Patrick', 1, '0123456789', '$2y$10$PJj0tb9pKU6JuqfZ.Pbg6.1cWf1/vM3v6E0UgzR8Ly6Qv64djZqmm', 'ee541193e1df142dba972c613674d580'),
(2, 'Doe', 'John', 2, '0123456789', '$2y$10$hKEW8RMgZz4xkdXmxh46N.7sr1IbB5F0KBS.cvogdKUUKmmKrGBeO', 'be4aa685de4e3859e31924f2bb879cbc'),
(3, 'Sherman', 'William', 4, '0301557099', '$2y$10$OwAaAd.u87xWQrYZ0gSryeDtRArNa.NPC8clzl6iCrAxjH9ebQumi', '7202e94f6f08c12da7787adbbafffe99'),
(4, 'Mark', 'Louis', 5, '0227809145', '$2y$10$VjgYOkraGpypj3yUKa.Q6eXsX./KyJk2.nEjUpJu0TEKphKVisasq', 'f084d7a5196f6c7fab07444afe212125'),
(5, 'Accentã©', 'Jã©sus', 6, '0855302510', '$2y$10$s7e4Zn9va0uTHajKw4x1CO5mrwkH.OxkgfIte7.Y6IAzoj6.dnz8S', '6ae2f3bed772b611839233f6e56c4ff8'),
(6, 'Pagnol', 'Marcel', 7, '0123550090', '$2y$10$.lm3KefdeN.RGDJJKxrlx.Bsr.wRAyX45M9hqJrXxWvjgfiK6dFo2', 'f82326c6637a0260dc2124343c45ab86'),
(7, 'Johnson', 'Long', 9, '0225034580', '$2y$10$LyJB.tWavjgmTTEl2AbPc.MHGZtkD71zNkAy5F05sBuDfEqEBHM9a', '0559b614fcf6b1ed62c83531e438c3f3'),
(8, 'Last', 'User', 10, '0102030405', '$2y$10$fGe7x47fn0qWvA6zImFDIuPmGuu4mIANbStOVUcHarXNSloUtp4me', 'bc477d19a658db75ccc6714d13bbc781'),
(9, 'Kill', 'Bill', 11, '0404258091', '$2y$10$ATpeaPfmdkDdS3sZMOll9eQpuQv68IPDk6icM3RpnUn1AqjZlvce.', '0cd65fb3b687360f2c4ebb6cffc1af2f'),
(10, 'Chestel', 'Louis', 12, '0400185800', '$2y$10$1/ONOnbIrx6Ja9zM4DC/Qumhf9bKEYyLjTTpGJQ66WufIVslJr/wW', '5cf86e405be2c36f038783365f97d66e'),
(11, 'Bautista', 'David', 13, '0525604780', '$2y$10$0W7puwceQe3WeF2nkPU3/OzbkKZRxzlAzhL4fon5hDCq90RO.s1lG', '363c8c2cea5a3aa628f63ad1242eee5a'),
(24, 'Petropoulos', 'Theo', 34, '0123550090', '$2y$10$6dECF0k5GF5hGrI1Yn1LzexjKgLbjj3v6CQMAcpBT.h9glNCamU2O', '25b55935a14a16187127fc0f42e32090'),
(25, 'Petropoulos', 'Theo', 35, '0525604780', '$2y$10$KifbYYyZGKfVJ7SwfEqUj.UPqo0EtgDaWCB2pm33AaSgPymzKaFNO', '42a53bd1409ca471be0739f5f7592293'),
(28, 'Doe', 'Theo', 38, '0225034580', '$2y$10$sVInef.maNIvqoOWBhw57uT0dZH4Oq99nfnrwztT8wbQ2Zrfgjh/y', 'bcefc685727e3a568a0892a7b9c3a651');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_produit` int NOT NULL,
  `id_facture` int NOT NULL,
  `quantite_produit` int NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produit` (`id_produit`),
  KEY `id_facture` (`id_facture`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `id_produit`, `id_facture`, `quantite_produit`, `prix`) VALUES
(13, 3, 1, 2, 32900),
(14, 13, 1, 1, 9600),
(15, 15, 2, 1, 6300),
(16, 3, 2, 1, 32900),
(17, 17, 2, 1, 31240),
(18, 2, 2, 1, 25900),
(19, 8, 3, 1, 25900),
(20, 2, 3, 1, 25900),
(21, 15, 3, 3, 6300),
(22, 13, 4, 1, 9600),
(23, 9, 5, 1, 13180),
(24, 1, 5, 1, 53900),
(25, 3, 5, 1, 32900),
(26, 13, 5, 1, 9600),
(27, 15, 5, 1, 6300),
(28, 12, 5, 1, 124500),
(29, 11, 5, 1, 31240),
(30, 9, 6, 1, 13180),
(31, 7, 6, 1, 14470),
(32, 10, 6, 1, 34430),
(33, 3, 6, 1, 32900),
(34, 6, 6, 1, 34900),
(35, 14, 6, 1, 25900),
(36, 16, 6, 1, 37400),
(37, 13, 6, 1, 9600),
(38, 5, 6, 1, 34900),
(39, 4, 6, 1, 60000),
(40, 18, 6, 1, 11500),
(41, 2, 6, 1, 25900),
(42, 3, 7, 1, 32900),
(43, 18, 7, 1, 11500),
(44, 2, 7, 1, 25900),
(45, 15, 9, 1, 6300),
(46, 18, 9, 4, 11500),
(47, 2, 9, 2, 25900),
(48, 1, 10, 1, 53900),
(49, 7, 10, 1, 14470),
(50, 11, 11, 1, 31240),
(51, 11, 11, 1, 31240),
(52, 11, 11, 1, 31240),
(53, 1, 11, 1, 53900),
(54, 1, 11, 1, 53900),
(55, 2, 11, 1, 25900),
(56, 4, 11, 1, 60000),
(57, 8, 12, 2, 25900),
(58, 16, 12, 2, 37400),
(59, 15, 12, 1, 6300),
(60, 7, 12, 1, 14470),
(61, 3, 13, 3, 32900),
(62, 11, 13, 13, 31240),
(63, 3, 14, 1, 32900),
(64, 16, 14, 17, 37400),
(65, 1, 15, 1, 53900),
(66, 2, 16, 1, 25900),
(67, 5, 17, 1, 34900),
(68, 2, 18, 1, 25900),
(69, 7, 19, 1, 14470),
(70, 18, 20, 1, 11500),
(71, 18, 21, 1, 11500),
(72, 4, 22, 1, 60000),
(73, 15, 23, 2, 6300),
(74, 9, 23, 2, 13180),
(75, 2, 23, 2, 25900),
(76, 8, 23, 1, 25900),
(77, 6, 24, 1, 34900),
(78, 18, 25, 1, 11500),
(79, 11, 25, 1, 31240),
(80, 2, 25, 1, 25900),
(81, 16, 26, 6, 37400),
(82, 7, 26, 1, 14470),
(83, 2, 26, 1, 25900);

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

DROP TABLE IF EXISTS `factures`;
CREATE TABLE IF NOT EXISTS `factures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_client` int DEFAULT NULL,
  `date` date NOT NULL,
  `etat` varchar(100) NOT NULL,
  `suivi` varchar(100) DEFAULT NULL,
  `total` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `id_client`, `date`, `etat`, `suivi`, `total`) VALUES
(1, 10, '2021-03-03', 'Payé', NULL, 75400),
(2, 10, '2021-03-03', 'Payé', NULL, 96340),
(3, 10, '2021-03-03', 'Payé', NULL, 70700),
(4, 10, '2021-03-05', 'Payé', NULL, 9600),
(5, 10, '2021-03-05', 'Payé', NULL, 271620),
(6, 10, '2021-03-05', 'Payé', NULL, 335080),
(7, 10, '2021-03-06', 'Payé', NULL, 70300),
(8, 10, '2021-03-08', 'Payé', NULL, 104100),
(9, 10, '2021-03-08', 'Payé', NULL, 104100),
(10, 10, '2021-03-08', 'Payé', NULL, 68370),
(11, 10, '2021-03-08', 'Payé', NULL, 407420),
(12, 10, '2021-03-09', 'Payé', NULL, 147370),
(13, 10, '2021-03-14', 'Payé', NULL, 504820),
(14, 10, '2021-03-14', 'Payé', NULL, 668700),
(15, 10, '2021-03-14', 'Payé', NULL, 53900),
(16, 10, '2021-03-14', 'Payé', NULL, 25900),
(17, 10, '2021-03-14', 'Payé', NULL, 34900),
(18, 10, '2021-03-14', 'Payé', NULL, 25900),
(19, 10, '2021-03-14', 'Payé', NULL, 14470),
(20, 10, '2021-03-14', 'Payé', NULL, 11500),
(21, 10, '2021-03-14', 'Payé', NULL, 11500),
(22, 10, '2021-03-14', 'Payé', 'instance', 60000),
(23, 10, '2021-03-16', 'Payé', 'done', 116660),
(24, NULL, '2021-03-16', 'Payé', NULL, 34900),
(25, 24, '2021-03-19', 'Payé', NULL, 68640),
(26, 25, '2021-03-31', 'Payé', NULL, 264770);

-- --------------------------------------------------------

--
-- Structure de la table `ip`
--

DROP TABLE IF EXISTS `ip`;
CREATE TABLE IF NOT EXISTS `ip` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `id_client` int NOT NULL,
  `blacklist` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ip`
--

INSERT INTO `ip` (`id`, `ip`, `id_client`, `blacklist`) VALUES
(19, '127.0.0.1', 25, 0);

-- --------------------------------------------------------

--
-- Structure de la table `mails`
--

DROP TABLE IF EXISTS `mails`;
CREATE TABLE IF NOT EXISTS `mails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mails`
--

INSERT INTO `mails` (`id`, `mail`, `newsletter`) VALUES
(1, 'patrick.jane@gmail.com', 0),
(2, 'john.doe@gmail.com', 1),
(3, 'john.dorian@gmail.com', 1),
(4, 'tecumseh@gmail.com', 0),
(5, 'louis.974@hotmail.com', 0),
(6, 'testaccent@accent.com', 0),
(7, 'marcellus_sud@mail.com', 0),
(8, 'scott.malkinson@yahoo.com', 1),
(9, 'long.johnson@sfr.fr', 0),
(10, 'last.user@gmail.com', 0),
(11, 'kill.bill@gmail.com', 0),
(12, 'louis.chestel@gmail.com', 0),
(13, 'batista@gmail.com', 0),
(34, 'gblfrpz@gmail.com', 0),
(35, 'mpetropoulos.theo@gmail.com', 0),
(38, 'theo.petropoulos@laplateforme.io', 0);

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

DROP TABLE IF EXISTS `marques`;
CREATE TABLE IF NOT EXISTS `marques` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` varchar(2500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `nom`, `description`) VALUES
(1, 'Audemars Piguet', 'Depuis 1875, Audemars Piguet perpétue le savoir-faire ancestral de ses fondateurs dans un esprit résolument avant-gardiste, repoussant constamment les limites de son art et anticipant les tendances. Ce mélange sans compromis de tradition et d’innovation forge l’essence-même du savoir-faire de la Manufacture.\r\nLes complications sont au cœur de l’ADN d’Audemars Piguet et de l’histoire collective de la vallée de Joux. Dès ses débuts, la Manufacture crée des garde-temps à complications, en se spécialisant dans les montres à quantième perpétuel, à sonnerie et à chronographe. Ces chefs-d’œuvre de complication incarnent l’esprit de la Manufacture, enracinée dans le passé et résolument visionnaire.\r\nAu fil des années, les horlogers et artisans Audemars Piguet n\'ont eu de cesse de repousser les frontières techniques et théoriques pour concevoir des mécanismes toujours plus exigeants et des designs révolutionnaires.'),
(2, 'Blancpain', '\r\n\r\nUn garde-temps de prestige est une merveilleuse mécanique. Les talents requis pour créer de telles montres sont rares et exigeants. Les maîtres horlogers et artistes qui les exercent ont la particularité de pouvoir y abriter des complications difficiles à réaliser – calendriers perpétuels, tourbillons, carrousels, chronographes ou répétitions minutes, entre autres – ou de les orner de décorations. \r\n\r\nAvec ses ingénieurs en construction horlogère, ses maîtres horlogers et ses artisans en métiers d’art, tous réunis à la Vallée de Joux en Suisse, Blancpain perpétue les grandes traditions et le savoir-faire de la haute horlogerie. Le respect de l’héritage et des métiers traditionnels influence tout ce que nous entreprenons. Nous ne sommes cependant pas prisonniers du passé. Au contraire, l\'innovation est notre tradition. Ce principe directeur nous guide dans la création de nouveaux garde-temps et nous permet d’intégrer des technologies modernes, compatibles avec les procédés du secteur, afin de repousser toujours plus loin l’art horloger. Par exemple, pour le spiral de balancier, Blancpain utilise désormais du silicium dans la quasi-totalité de ses garde-temps. La performance, les propriétés amagnétiques et la précision de ce matériau sont supérieures à celles des matériaux préexistants. De même, des avancées ont pu voir le jour grâce à l’utilisation de titane (pour les roues de balancier), d’alliages spéciaux (pour les ressorts de barillet), de Liquidmetal® (pour certains marquages et les profondimètres de montres de plongée), de céramique (pour les boîtiers) et de techniques de précision dans la fabrication des roues et des pignons.'),
(3, 'Omega', 'Par son ancienneté, sa longévité, sa visibilité (chronométrage sportif, conquête spatiale) et sa taille, Omega est l\'une des sociétés-phares de l\'industrie horlogère suisse. Elle a en effet été la pionnière en matière d\'industrialisation de la production (mécanisation, production de masse). Outre l\'excellence de ses produits, reconnue par d\'innombrables prix internationaux, elle a aussi été l\'un des lieux de la lutte ouvrière et de la progressive amélioration des conditions de travail.\r\nAujourd\'hui, après les tourments et les errements provoqués par l\'invasion du quartz et des productions japonaises des années 1970, la marque est à nouveau une figure de proue de l\'industrie. Omega a développé des solutions techniques originales (échappement coaxial, calibres maison) et le design a été modernisé. Appartenant au Swatch Group, elle se situe aujourd\'hui dans le segment « prestige » du marché, et certaines de ses productions visent clairement à se positionner dans le segment « luxe ». De plus, depuis quelques années, la firme développe un secteur joaillerie.\r\nFidèle à la région biennoise, Omega a cependant exploité des succursales ou des ateliers à Cortébert, Genève, Köniz, Lausanne, Le Sentier, Les Genevez et Villeret.\r\nLa firme est active dans le chronométrage sportif depuis 1909, le traitement et l\'affichage des données. Elle a assumé cette tâche la première fois lors des Jeux olympiques d\'été de 1932 à Los Angeles et, plus récemment, lors des Jeux olympiques de Turin en 2006, de Pékin en 2008 et de Vancouver en 2010. La marque signe avec les Jeux olympiques d\'été de 2016 sa 27e participation en tant que chronométreur officiel. ');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `stock` int NOT NULL,
  `id_marque` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `id_marque` (`id_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `stock`, `id_marque`, `image`, `description`) VALUES
(1, '[RE]MASTERY01', 53900, 19, 1, '[RE]MASTERY01.jpg', 'Une édition limitée à 500 pièces qui sera disponible à la ré-ouverture des boutiques après la crise sanitaire que nous traversons et au prix de 53.900€. Une démonstration des plus hauts savoir-faire de la marque, et surtout une autre démonstration que tout ne tourne pas autour de la Royal Oak. Une édition limitée qui fait sens dans un univers horloger où les éditions limitées n’ont parfois plus toute leur tête.'),
(2, 'CODE 11.59', 25900, 34, 1, 'CODE 11.59.jpg', 'Le cadran bleu laqué de ce modèle est mis en valeur par l’or gris de la boîte, des index et chiffres galbés, des longues aiguilles en bâton, et de la signature Audemars Piguet, réalisée par croissance galvanique.\r\nCette montre dispose du nouveau calibre Manufacture 4302 automatique, équipé d’une masse oscillante en or rose 22 carats créée pour la collection. Avec son diamètre de 32 mm et sa fréquence de 4 Hertz, ce calibre garantit fiabilité et précision.\r\nL’intégration parfaite du bracelet dans la continuité des cornes ajourées met en relief l’architecture complexe de la boîte et ses finitions raffinées faites à la main.'),
(3, 'JULES AUDEMARS', 32900, 36, 1, 'JULES AUDEMARS.jpg', 'Fer de lance de la collection Jules Audemars, la Jules Audemars Extra-plate abrite l’un des mouvements automatiques les plus plats au monde : le calibre 2120 de 2,45 mm d’épaisseur. Incroyablement pure, cette montre dispose d’une lunette étroite, d’un boîtier en or gris et d’un cadran argenté. Un magnifique exemple de classe et de sobriété.'),
(4, 'MILLENARY', 60000, 19, 1, 'MILLENARY.jpg', 'L\'atypique Millenary revient cette année pour le plus grand bonheur des femmes en affichant leur indépendance et leur force de caractère. Véritable exercice de style horloger avec son calibre complexe ajouré qui pousse sur le devant de la scène son balancier, ce garde-temps au boîtier ovale a aussi l’audace d’associer or gris et or rose, nacre, diamants et acier.'),
(5, 'ROYAL OAK OFFSHORE', 34900, 3, 1, 'ROYAL OAK OFFSHORE.jpg', 'la Royal Oak est une montre sportive et les associations de la marque avec des grands noms des sports extrêmes tels que Michael Schumacher pour un modèle en édition limitée viennent le confirmer. C’est d’ailleurs à ce marché que s’adresse la Royal Oak Offshore qui allie acier, titane, céramique et caoutchouc au gré des modèles tous résistants aux ondes magnétiques (amagnétique).'),
(6, 'ROYAL OAK', 34900, 1, 1, 'ROYAL OAK.jpg', 'la Royal Oak est une montre sportive et les associations de la marque avec des grands noms des sports extrêmes tels que Michael Schumacher pour un modèle en édition limitée viennent le confirmer. C’est d’ailleurs à ce marché que s’adresse la Royal Oak Offshore qui allie acier, titane, céramique et caoutchouc au gré des modèles tous résistants aux ondes magnétiques (amagnétique).'),
(7, 'Bathyscaphe Limited Edition Mokarran', 14470, 4, 2, 'Bathyscaphe Limited Edition Mokarran.png', 'La diversité dans les océans constitue un enjeux primordial pour Blancpain. Les campagnes Ocean Commitment (BOC) menées par la manufacture participent à leur étude. L’objet de l’édition limitée à 50 exemplaires de la Bathyscaphe Mokarran Limited Edition est d’observer et d’aider à la protection des grands requins-marteaux. Concrètement, chaque client qui fait l’acquisition d’un garde-temps de cette série se joint à Blancpain pour soutenir l’association Mokarran Protection Society à hauteur de 1’000 dollars US. Un total de 50’000 dollars s’ajoutera ainsi aux contributions régulières de la marque pour faire connaître, respecter et protéger le monde des océans.'),
(8, 'Bathyscaphe Quantième Annuel', 25900, 8, 2, 'Bathyscaphe Quantième Annuel.png', 'Le Bathyscaphe, pilier de la collection Fifty Fathoms, associe pour la première fois le sport à une complication utile dans un nouveau modèle de calendrier annuel. Tout l\'ADN de la montre de plongée est entièrement préservé dans cette première de Baselworld avec une lisibilité claire, un mouvement robuste et une lunette tournante unidirectionnelle.'),
(9, 'Fifty Fathoms Barakuda', 13180, 3, 2, 'Fifty Fathoms Barakuda.png', 'Lors de son lancement en 1953, la Fifty Fathoms est la première montre de plongée moderne. Les hommes-grenouilles des plus grands corps de marine à travers le monde l\'intègrent rapidement comme élément fondamental de leur équipement. Les Français seront les premiers à se munir de modèles Fifty Fathoms pour leurs missions subaquatiques. D\'autres élites militaires suivront, dont la Bundesmarine allemande dans les années 60\'. Cette dernière sera approvisionnée en pièces Fifty Fathoms par l\'intermédiaire de Barakuda, une entreprise spécialisée dans la production et la commercialisation de matériel de plongée. En marge des montres destinées à l\'armée, la société fera entrer sur le marché germanique un modèle civil adoptant un style particulier, entre autres marqué par l\'utilisation d\'index rectangulaires bicolores, d\'aiguilles fluorescentes peintes en blanc, ainsi que par l\'affichage soutenu d\'un quantième à 3h. Certains garde-temps de cette série seront montés sur un bracelet en caoutchouc de type tropic. Alors très populaire auprès des plongeurs, ce dernier est notamment réputé pour sa résistance dans le temps et son confort au porté.'),
(10, 'Fifty Fathoms Chronographe Flyback Quantième Complet', 34430, 40, 2, 'Fifty Fathoms Chronographe Flyback Quantième Complet.png', 'Cette nouvelle Fifty Fathoms est animée par un mouvement de 448 pièces qui présente « une série d’innovations développées par Blancpain » assure la marque dans son communiqué.\r\nLe quantième complet et la phase de lune sont associés au calibre F185 qui accorde à l’utilisateur la liberté de modifier à loisir chaque indication, quelle que soit l’heure du jour ou de la nuit. Habituellement, rappelle Blancpain, les mécanismes de calendrier complet et de phase de lune proscrivent en effet l’ajustement des affichages pendant certaines plages horaires au risque d’endommager les délicats composants du calendrier.'),
(11, 'Fifty Fathoms Chronographe', 31240, 26, 2, 'Fifty Fathoms Chronographe.png', 'Cette nouvelle Fifty Fathoms est animée par un mouvement de 448 pièces qui présente « une série d’innovations développées par Blancpain » assure la marque dans son communiqué.\r\nLe quantième complet et la phase de lune sont associés au calibre F185 qui accorde à l’utilisateur la liberté de modifier à loisir chaque indication, quelle que soit l’heure du jour ou de la nuit. Habituellement, rappelle Blancpain, les mécanismes de calendrier complet et de phase de lune proscrivent en effet l’ajustement des affichages pendant certaines plages horaires au risque d’endommager les délicats composants du calendrier.'),
(12, 'Fifty Fathoms Tourbillon', 57000, 40, 2, 'Fifty Fathoms Tourbillon.png', 'Que dire de la Tourbillon? si ce n\'est qu\'il s\'agit d\'une des version de la collection Fifty Fathoms et que son image se suffit à elle même. En tant que plus ancienne marque horlogère au monde, Blancpain est l’archétype de la Manufacture à l’héritage horloger pluri-séculaire qui a su préserver sa tradition, tout en y insufflant un esprit d\'innovation. A chaque époque correspond une invention qui a marqué son temps et est restée référente à travers les décennies. la tourbillon a su révolutionner l\'horlogerie de part un mécanisme ouvert qui saura vous distinguer du commun des mortel.'),
(13, 'DARKSIDE OF THE MOON', 9600, 14, 3, 'DARKSIDE OF THE MOON.png', 'Incarnant à la perfection le style audacieux, la technologie avant-gardiste et l\'esprit d\'aventure d\'OMEGA, ce modèle OMEGA Speedmaster « Dark Side of the Moon » en céramique à l\'allure élancée et sportive vient enrichir la collection emblématique. Cette montre unique est pourvue d\'un cadran en céramique noire, composée d\'oxyde de zirconium, qui se distingue par ses sublimes aiguilles de style « Moonwatch » en or blanc 18K et ses deux compteurs en céramique à 3 et 9 heures.\r\n\r\nUne échelle tachymétrique en nitrure de chrome mat, l\'une des caractéristiques les plus reconnaissables de la ligne Speedmaster, se détache sur la lunette en céramique polie, montée sur un boîtier de 44,25 mm en céramique brossée et polie. En hommage à l\'héritage et au fascinant design de la Speedmaster, la mention « Dark Side of the Moon » est gravée sur le fond du boîtier en céramique juste au-dessus du verre saphir. Cette montre est animée par le calibre OMEGA Co-Axial 9300.'),
(14, 'GLOBEMASTER- CO-AXIAL MASTER', 25900, 11, 3, 'GLOBEMASTER- CO-AXIAL MASTER.png', 'Légende vivante de la famille OMEGA, la Globemaster a été réinventée pour devenir le premier Master Chronometer au monde et marquer plus que jamais l\'histoire de l\'horlogerie.\r\n\r\nEn plus de répondre à un nouveau standard de qualité, son design épuré et captivant la transforme en véritable objet de désir. Sur ce modèle, le boîtier en acier inoxydable est doté d\'une lunette cannelée inrayable en métal dur, d\'une étoile Constellation rhodiée et d\'index et d\'aiguilles revêtus de Super-LumiNova luminescent.\r\n\r\nSur le fond, on peut admirer un médaillon en acier inoxydable représentant l\'Observatoire central. Le cadran « pie-pan » soleillé bleu rappelle quant à lui la première montre Constellation de 1952.\r\n\r\nUn bracelet en cuir bleu assorti vient compléter le design de la montre, entraînée en son cœur par le calibre OMEGA Co-Axial Master Chronometer 8900 doté d\'une technologie antimagnétique révolutionnaire.'),
(15, 'HOUR VISION', 6300, 38, 3, 'HOUR VISION.png', 'Reflet d\'un savoir-faire exceptionnel en termes d\'esthétique et de technique, la OMEGA De Ville Hour Vision est une montre à l’équilibre parfait.\r\n\r\nSon cadran bleu brossé en soleil est rehaussé d’une minuterie de couleur assortie, une gamme de coloris rappelée par le bracelet en cuir unique en son genre.\r\n\r\nLe boîtier de 41 mm en acier inoxydable est animé d’aiguilles « parform » et d’index à la surface facettée en or blanc 18K.\r\n\r\nDotée d’un guichet de date à 3 heures, cette montre exceptionnelle est entraînée par le calibre OMEGA Co-Axial Master Chronometer 8900, capable de résister à des champs magnétiques d’une intensité supérieure à 15 000 gauss.'),
(16, 'LADYMATIC', 37400, 17, 3, 'LADYMATIC.png', 'L\'OMEGA Ladymatic est un fascinant mélange de design extraordinaire et d\'innovation horlogère à la pointe de la technologie. Elle a été créée pour répondre au désir des femmes de porter des montres alliant le meilleur de la technologie et du design.\r\n\r\nCette OMEGA Ladymatic est pourvue d\'un cadran en nacre blanche doté d\'un guichet de date à 3 heures et d\'index sertis de diamants et décoré d\'un motif SuperNova. L\'exquis cadran est visible à travers un verre saphir résistant aux rayures. Recouverte de diamants disposés tels des flocons de neige, la lunette est montée sur un boîtier de 34 mm en or rouge 18K sur un bracelet également en or rouge 18K.\r\n\r\nLe pourtour du boîtier se distingue par une bague en or placée entre une ondulation externe décorative et l\'intérieur du boîtier en céramique blanche. Le fond du boîtier transparent permet d\'admirer le calibre OMEGA Co-Axial 8521 animant la montre.'),
(17, 'PRESTIGE S', 31240, 40, 3, 'PRESTIGE S.png', 'Grâce à son design classique et élégant, la collection OMEGA De Ville Prestige a su attirer une clientèle large et fidèle. Ces montres au design intemporel se distinguent par leur style épuré aux finitions luxueuses.\r\n\r\nCe modèle est doté d’un cadran blanc argenté avec finition opaline, décoré d’un motif rappelant la soie. Les aiguilles facettées sont noircies, à l\'instar des chatons des six diamants et des six chiffres romains utilisés en guise d\'index.\r\n\r\nLe boîtier de 27,4 mm en acier inoxydable repose sur un bracelet Prestige en acier inoxydable poli. Ce garde-temps est animé par le calibre OMEGA 1376.'),
(18, 'SEA MASTER PLANET OCEAN', 11500, 37, 3, 'SEA MASTER PLANET OCEAN.png', 'En 2005, OMEGA a lancé sa ligne Planet Ocean, en gardant à l’esprit son héritage maritime. Aujourd\'hui, l\'élégante OMEGA Seamaster Planet Ocean 600M Master Chronometer rend hommage au patrimoine de la montre de plongée OMEGA.\r\n\r\nCe modèle est pourvu d’un verre saphir inrayable et d’un cadran en céramique noire doté de chiffres arabes et d’un guichet de date à 6 heures. Le cadran est pourvu d\'une petite seconde ainsi que des compteurs 60 minutes et 12 heures pour une lecture intuitive du temps écoulé. La lunette, qui associe pour la première fois céramique noire et caoutchouc orange, est montée sur un boîtier de 45,5 mm en acier inoxydable et présente une échelle de plongée en Liquidmetal™.\r\n\r\nLa montre se distingue également par son fond vissé au design alvéolaire et son bracelet en acier inoxydable fermé par une boucle déployante extensible brevetée.\r\n\r\nLe chronographe OMEGA Seamaster Planet Ocean 600M Master Chronometer est étanche à 600 mètres (60 bars / 2 000 pieds) et équipé d\'une valve à hélium. Le calibre OMEGA Master Chronometer 9900 situé au cœur de cette montre est visible à travers le fond du boîtier transparent. Pour obtenir la certification Master Chronometer, il a dû réussir huit tests rigoureux établis par le METAS, l\'Institut fédéral suisse de métrologie.');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `pourcentage` int NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `id_produit` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `adresses_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  ADD CONSTRAINT `caracteristiques_ibfk_1` FOREIGN KEY (`produit`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`id_mail`) REFERENCES `mails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`id_facture`) REFERENCES `factures` (`id`);

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `ip`
--
ALTER TABLE `ip`
  ADD CONSTRAINT `ip_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_marque`) REFERENCES `marques` (`id`);

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
