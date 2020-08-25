-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 02 avr. 2020 à 20:25
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `payez`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `iduser` int(11) NOT NULL,
  `idcommande` int(11) NOT NULL,
  `idproduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`iduser`, `idcommande`, `idproduit`, `quantite`) VALUES
(4, 1, 1, 1),
(4, 1, 2, 1),
(4, 2, 1, 1),
(4, 2, 2, 1),
(4, 3, 1, 1),
(4, 3, 2, 1),
(4, 4, 1, 1),
(4, 4, 2, 1),
(4, 5, 1, 1),
(4, 5, 2, 1),
(4, 6, 1, 1),
(4, 6, 2, 1),
(4, 7, 1, 1),
(4, 7, 2, 1),
(4, 8, 1, 1),
(4, 8, 2, 1),
(4, 9, 1, 1),
(4, 9, 2, 1),
(4, 10, 3, 2),
(4, 11, 3, 2),
(4, 11, 2, 1),
(4, 11, 1, 3),
(4, 12, 1, 2),
(4, 12, 2, 4),
(4, 13, 1, 2),
(4, 13, 2, 4),
(4, 14, 1, 2),
(4, 14, 2, 4),
(4, 15, 1, 2),
(4, 15, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `image`, `prix`) VALUES
(1, 'T-shirt Salar', 'T-shirt.PNG', 15.00),
(2, 'MUG Salar', 'Tasse.PNG', 10.00),
(3, 'Postere Zerod', 'Zerod.PNG', 25.00);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `numero` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `adresse`, `email`, `numero`) VALUES
(4, 'Hicham', 'attigui', '188 rue des Champarons', 'hicham.attigui@hotmail.fr', 767800233);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
