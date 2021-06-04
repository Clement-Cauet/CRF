-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 04 juin 2021 à 14:43
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crf`
--

-- --------------------------------------------------------

--
-- Structure de la table `base_log`
--

DROP TABLE IF EXISTS `base_log`;
CREATE TABLE IF NOT EXISTS `base_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `localisation` varchar(20) NOT NULL,
  `quantite` int(11) NOT NULL,
  `quantiteMin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `base_log`
--

INSERT INTO `base_log` (`id`, `nom`, `localisation`, `quantite`, `quantiteMin`) VALUES
(1, 'machin1', 'base_log', 12, 6),
(2, 'machin2', 'base_log', 4, 20),
(3, 'machin3', 'base_log', 8, 7);

-- --------------------------------------------------------

--
-- Structure de la table `pharmacie`
--

DROP TABLE IF EXISTS `pharmacie`;
CREATE TABLE IF NOT EXISTS `pharmacie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `localisation` varchar(20) NOT NULL,
  `quantite` int(11) NOT NULL,
  `quantiteMin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pharmacie`
--

INSERT INTO `pharmacie` (`id`, `nom`, `localisation`, `quantite`, `quantiteMin`) VALUES
(1, 'test1', 'Pharmacie', 46, 3),
(2, 'test2', 'Pharmacie', 3, 3),
(3, 'test3', 'Pharmacie', 17, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `nivol` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `admin` varchar(20) NOT NULL,
  PRIMARY KEY (`nivol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`nivol`, `login`, `mdp`, `nom`, `prenom`, `admin`) VALUES
('1100003175P', 'cauetcl', 'vgdX6Hbz', 'CAUET', 'Clement', 'Oui'),
('123', '123', '123', 'JEAN', 'Michel', 'Non');

-- --------------------------------------------------------

--
-- Structure de la table `vestiaire`
--

DROP TABLE IF EXISTS `vestiaire`;
CREATE TABLE IF NOT EXISTS `vestiaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `localisation` varchar(20) NOT NULL,
  `quantite` int(11) NOT NULL,
  `quantiteMin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vestiaire`
--

INSERT INTO `vestiaire` (`id`, `nom`, `localisation`, `quantite`, `quantiteMin`) VALUES
(1, 'truc1', 'vestiaire', 20, 42),
(2, 'truc2', 'vestiaire', 0, 10),
(3, 'truc3', 'vestiaire', 46, 22);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
