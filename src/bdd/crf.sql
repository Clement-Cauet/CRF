-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 juin 2021 à 15:24
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
-- Structure de la table `actualite`
--

DROP TABLE IF EXISTS `actualite`;
CREATE TABLE IF NOT EXISTS `actualite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(20) NOT NULL,
  `nivolUser` varchar(20) NOT NULL,
  `nomUser` varchar(20) NOT NULL,
  `prenomUser` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id`, `titre`, `message`, `date`, `type`, `nivolUser`, `nomUser`, `prenomUser`) VALUES
(1, 'Article d\'urgence', 'Ceci est un article de test', '2021-06-22 14:45:14', 'urgence', '1100003175P', 'CAUET', 'Clement'),
(3, 'Article d\'annonce', 'Ceci est un message annonce', '2021-06-22 17:01:27', 'annonce', '1100003175P', 'CAUET', 'Clement'),
(4, 'Article de maj', 'Ceci est un message de maj', '2021-06-22 17:01:29', 'maj', '1100003175P', 'CAUET', 'Clement');

-- --------------------------------------------------------

--
-- Structure de la table `base_log`
--

DROP TABLE IF EXISTS `base_log`;
CREATE TABLE IF NOT EXISTS `base_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `quantite` int(11) NOT NULL,
  `quantiteMin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `base_log`
--

INSERT INTO `base_log` (`id`, `nom`, `quantite`, `quantiteMin`) VALUES
(1, 'machin1', 12, 6),
(2, 'machin2', 4, 20),
(3, 'machin3', 8, 7);

-- --------------------------------------------------------

--
-- Structure de la table `main_courante`
--

DROP TABLE IF EXISTS `main_courante`;
CREATE TABLE IF NOT EXISTS `main_courante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `report` tinyint(1) NOT NULL DEFAULT '0',
  `nivolUser` varchar(20) NOT NULL,
  `nomUser` varchar(20) NOT NULL,
  `prenomUser` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `main_courante`
--

INSERT INTO `main_courante` (`id`, `message`, `date`, `report`, `nivolUser`, `nomUser`, `prenomUser`) VALUES
(1, 'Se connecte sur l\'opération', '2021-06-15 00:00:00', 0, '1100003175P', 'CAUET', 'Clement'),
(2, 'Se connecte sur l\'opération', '2021-06-15 17:15:14', 0, '1100003175P', 'CAUET', 'Clement'),
(3, 'Se connecte sur l\'opération', '2021-06-16 10:12:37', 0, '1100003175P', 'CAUET', 'Clement'),
(4, 'Se connecte sur l\'opération', '2021-06-16 10:49:04', 0, '1100003175P', 'CAUET', 'Clement'),
(5, 'Ceci est un message pour vérifié que l\'application fonctionne, double cliquez pour modifier le contenu.', '2021-06-16 11:09:01', 0, '1100003175P', 'CAUET', 'Clement'),
(10, 'Se connecte sur l\'opération', '2021-06-16 13:51:13', 0, '123', 'JEAN', 'Michel'),
(11, 'Vérification avec un autre compte', '2021-06-16 13:51:51', 1, '123', 'JEAN', 'Michel'),
(12, 'Se connecte sur l\'opération', '2021-06-16 13:52:03', 0, '1100003175P', 'CAUET', 'Clement');

-- --------------------------------------------------------

--
-- Structure de la table `pharmacie`
--

DROP TABLE IF EXISTS `pharmacie`;
CREATE TABLE IF NOT EXISTS `pharmacie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `quantite` int(11) NOT NULL,
  `quantiteMin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pharmacie`
--

INSERT INTO `pharmacie` (`id`, `nom`, `quantite`, `quantiteMin`) VALUES
(1, 'test1', 2, 3),
(2, 'test2', 6, 3),
(3, 'test3', 17, 3);

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
  `quantite` int(11) NOT NULL,
  `quantiteMin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vestiaire`
--

INSERT INTO `vestiaire` (`id`, `nom`, `quantite`, `quantiteMin`) VALUES
(1, 'truc1', 20, 42),
(2, 'truc2', 0, 10),
(3, 'truc3', 46, 22);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
