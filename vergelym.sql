-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 04 Décembre 2018 à 10:56
-- Version du serveur :  5.5.47-0+deb8u1
-- Version de PHP :  7.0.4-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `Clients` (
  `idClient` smallint(6) NOT NULL,
  `pseudoClient` varchar(20) NOT NULL,
  `nomClient` varchar(20) NOT NULL,
  `prenomClient` varchar(20) NOT NULL,
  `mailClient` varchar(25) NOT NULL,
  `mdpClient` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Clients`
--

INSERT INTO `Clients` (`idClient`, `pseudoClient`, `nomClient`, `prenomClient`, `mailClient`, `mdpClient`) VALUES
(7, 'vergelym', 'Vergely', 'Matthew', 'vergely.matt@gmail.com', 'd89198be61896ae48f33b5452d8caf38df637e805a26dac28dc1d68a1addf9ed');

-- --------------------------------------------------------

--
-- Structure de la table `Commandes`
--

CREATE TABLE `Commandes` (
  `idCommande` smallint(6) NOT NULL,
  `idClient` smallint(6) NOT NULL,
  `prixCommande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Jeux`
--

CREATE TABLE `Jeux` (
  `idJeu` smallint(6) NOT NULL,
  `nomJeu` varchar(35) NOT NULL,
  `plateforme` enum('PS4','Xbox One') NOT NULL,
  `genre` enum('Action / Aventure','Course','FPS','Sport','Gestion','Activités récréatives') CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL,
  `image` varchar(150) NOT NULL,
  `noteSur5` float DEFAULT NULL,
  `prix` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Jeux`
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
(15, 'Halo 5', 'Xbox One', 'FPS', 'https://medias.micromania.fr/catalog/product/cache/1/image/800x/9df78eab33525d08d6e5fb8d27136e95/h/a/halo_5_1.jpg', 4.4, 20);

-- --------------------------------------------------------

--
-- Structure de la table `PasserCommande`
--

CREATE TABLE `PasserCommande` (
  `idCommande` smallint(6) NOT NULL,
  `idJeu` smallint(6) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `Commandes`
--
ALTER TABLE `Commandes`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `fk_Commande_idClient` (`idClient`);

--
-- Index pour la table `Jeux`
--
ALTER TABLE `Jeux`
  ADD PRIMARY KEY (`idJeu`);

--
-- Index pour la table `PasserCommande`
--
ALTER TABLE `PasserCommande`
  ADD PRIMARY KEY (`idCommande`,`idJeu`),
  ADD KEY `fk_PasserCommande_idJeu` (`idJeu`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `idClient` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `Commandes`
--
ALTER TABLE `Commandes`
  MODIFY `idCommande` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Jeux`
--
ALTER TABLE `Jeux`
  MODIFY `idJeu` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Commandes`
--
ALTER TABLE `Commandes`
  ADD CONSTRAINT `fk_Commande_idClient` FOREIGN KEY (`idClient`) REFERENCES `Clients` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `PasserCommande`
--
ALTER TABLE `PasserCommande`
  ADD CONSTRAINT `fk_PasserCommande_idCommande` FOREIGN KEY (`idCommande`) REFERENCES `Commandes` (`idCommande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_PasserCommande_idJeu` FOREIGN KEY (`idJeu`) REFERENCES `Jeux` (`idJeu`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
