-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 15 juin 2021 à 18:46
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
  `idUser` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idUser_2` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `main_courante`
--

INSERT INTO `main_courante` (`id`, `idUser`, `message`, `date`) VALUES
(1, '1100003175P', 'Se connecte sur l\'opération', '2021-06-15 00:00:00'),
(2, '1100003175P', 'Se connecte sur l\'opération', '2021-06-15 17:15:14');

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

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `main_courante`
--
ALTER TABLE `main_courante`
  ADD CONSTRAINT `main_courante_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`nivol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
