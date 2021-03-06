-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 déc. 2018 à 22:14
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vergelym`
--

-- --------------------------------------------------------

--
-- Structure de la table `Clients`
--

DROP TABLE IF EXISTS `Clients`;
CREATE TABLE IF NOT EXISTS `Clients` (
  `pseudoClient` varchar(20) NOT NULL,
  `nomClient` varchar(20) NOT NULL,
  `prenomClient` varchar(20) NOT NULL,
  `mailClient` varchar(25) NOT NULL,
  `mdpClient` varchar(150) NOT NULL,
  `nonce` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`pseudoClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Clients`
--

INSERT INTO `Clients` (`pseudoClient`, `nomClient`, `prenomClient`, `mailClient`, `mdpClient`, `nonce`) VALUES
('admin', 'Vergely', 'Matthew', 'test@test.com', '1912f7dfde414ae3d023417c05fd55ce0adb99cd594bacd9adc87efcbb3101ed', ''),
('skycrim', 'Bales', 'Jordan', 'jordanbales2@gmail.com', 'b50271682f3abbe7ec88351d833ccf7e741de8c405e60e602c5327e364d115a5', '');

--
-- Déclencheurs `Clients`
--
DROP TRIGGER IF EXISTS `trigger_InsertPseudo`;
DELIMITER $$
CREATE TRIGGER `trigger_InsertPseudo` BEFORE INSERT ON `Clients` FOR EACH ROW BEGIN

DECLARE v_pseudo INTEGER;
DECLARE v_mail INTEGER;

SELECT COUNT(*) INTO v_pseudo FROM Clients WHERE pseudoClient = NEW.pseudoClient;
IF (v_pseudo != 0) THEN
SIGNAL SQLSTATE '20001' SET MESSAGE_TEXT = 'pseudo déjà utilisé';
END IF;

SELECT COUNT(*) INTO v_mail FROM Clients WHERE mailClient = NEW.mailClient;
IF (v_mail != 0) THEN
SIGNAL SQLSTATE '20002' SET MESSAGE_TEXT = 'adresse mail déjà utilisé';
END IF;

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_updateMail`;
DELIMITER $$
CREATE TRIGGER `trigger_updateMail` BEFORE UPDATE ON `Clients` FOR EACH ROW BEGIN

DECLARE v_mail VARCHAR(25);
DECLARE nb_mail INTEGER;

SELECT mailClient INTO v_mail FROM Clients WHERE mailClient = NEW.mailClient;
SELECT COUNT(mailClient) INTO nb_mail FROM Clients WHERE mailClient = NEW.mailClient;
IF (v_mail != OLD.mailClient AND v_mail != 0) THEN
SIGNAL SQLSTATE '20002' SET MESSAGE_TEXT = 'adresse mail déjà utilisé';
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `Commandes`
--

DROP TABLE IF EXISTS `Commandes`;
CREATE TABLE IF NOT EXISTS `Commandes` (
  `idCommande` smallint(6) NOT NULL AUTO_INCREMENT,
  `pseudoClient` varchar(20) NOT NULL,
  `prixCommande` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `fk_Commande_idClient` (`pseudoClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Jeux`
--

DROP TABLE IF EXISTS `Jeux`;
CREATE TABLE IF NOT EXISTS `Jeux` (
  `idJeu` smallint(6) NOT NULL AUTO_INCREMENT,
  `nomJeu` varchar(35) NOT NULL,
  `plateforme` enum('PS4','Xbox One') NOT NULL,
  `genre` enum('Action / Aventure','Course','FPS','Sport','Gestion','Activités récréatives') CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL,
  `image` varchar(150) NOT NULL,
  `noteSur5` float DEFAULT NULL,
  `prix` smallint(6) NOT NULL,
  PRIMARY KEY (`idJeu`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Jeux`
--

INSERT INTO `Jeux` (`idJeu`, `nomJeu`, `plateforme`, `genre`, `image`, `noteSur5`, `prix`) VALUES
(1, 'Red Dead Redemption 2', 'PS4', 'Action / Aventure', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/1/5/1599919_max.jpg', 4.8, 70),
(2, 'Red Dead Redemption 2', 'Xbox One', 'Action / Aventure', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/1/5/1599927_max.jpg', 4.8, 70),
(3, 'Forza Motorsport 7', 'Xbox One', 'Course', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/1/5/1546051_max.jpg', 4.4, 50),
(4, 'Shadow of the Tomb Raider', 'PS4', 'Action / Aventure', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/1/7/1760840_max_1.jpg', 4.5, 60),
(5, 'Shadow of the Tomb Raider', 'Xbox One', 'Action / Aventure', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/1/7/1745380_max_1.jpg', 4.5, 60),
(6, 'Call of Duty : WWII', 'PS4', 'FPS', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/s/t/stronghold_ps4_front_fr_1.jpg', 4.2, 70),
(7, 'Call of Duty : WWII', 'Xbox One', 'FPS', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/s/t/stronghold_xone_front_fr_1.jpg', 4.2, 70),
(8, 'Fifa 19', 'PS4', 'Sport', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/1/7/1780448_max.jpg', 4, 70),
(9, 'Fifa 19', 'Xbox One', 'Sport', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/1/7/1780456_max.jpg', 4, 70),
(10, 'Les Sims 4', 'PS4', 'Gestion', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/s/i/sims4_std_ps4_1.jpg', 3.9, 40),
(11, 'Les Sims 4', 'Xbox One', 'Gestion', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/s/i/sims4_std_xo.jpg', 3.9, 40),
(12, 'Minecraft', 'PS4', 'Activités récréatives', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/8/1/81cuwwvvkgl._sl1500_.jpg', 4.6, 30),
(13, 'Minecraft', 'Xbox One', 'Activités récréatives', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/2/1/2192704_max_1.jpg', 4.6, 30),
(14, 'Uncharted : The Lost Legacy', 'PS4', 'Action / Aventure', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/p/s/ps4_uncharted_tll_2d_fre.jpg', 4, 70),
(15, 'Halo 5', 'Xbox One', 'FPS', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/h/a/halo_5_1.jpg', 4.4, 20),
(42, 'Just Cause 4', 'PS4', 'Action / Aventure', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/1/6/1632480_max.jpg', 5, 70),
(43, 'Just Cause 4', 'Xbox One', 'Action / Aventure', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/1/6/1632484_max.jpg', 5, 70);

-- --------------------------------------------------------

--
-- Structure de la table `PasserCommande`
--

DROP TABLE IF EXISTS `PasserCommande`;
CREATE TABLE IF NOT EXISTS `PasserCommande` (
  `idCommande` smallint(6) NOT NULL,
  `idJeu` smallint(6) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`,`idJeu`),
  KEY `fk_PasserCommande_idJeu` (`idJeu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Commandes`
--
ALTER TABLE `Commandes`
  ADD CONSTRAINT `fk_Commande_idClient` FOREIGN KEY (`pseudoClient`) REFERENCES `Clients` (`pseudoClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `PasserCommande`
--
ALTER TABLE `PasserCommande`
  ADD CONSTRAINT `fk_PasserCommande_idCommande` FOREIGN KEY (`idCommande`) REFERENCES `Commandes` (`idCommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_PasserCommande_idJeu` FOREIGN KEY (`idJeu`) REFERENCES `Jeux` (`idJeu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
