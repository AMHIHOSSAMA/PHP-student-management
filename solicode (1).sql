-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 16 mai 2022 à 08:13
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `solicode`
--

-- --------------------------------------------------------

--
-- Structure de la table `etdiant`
--

DROP TABLE IF EXISTS `etdiant`;
CREATE TABLE IF NOT EXISTS `etdiant` (
  `numInscription` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) DEFAULT NULL,
  `prenom` varchar(250) DEFAULT NULL,
  `dateDenaissance` date DEFAULT NULL,
  `adress` varchar(250) DEFAULT NULL,
  `tel` int(100) DEFAULT NULL,
  `numSalle` int(11) DEFAULT NULL,
  PRIMARY KEY (`numInscription`),
  KEY `numSalle` (`numSalle`)
) ENGINE=InnoDB AUTO_INCREMENT=734 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etdiant`
--

INSERT INTO `etdiant` (`numInscription`, `nom`, `prenom`, `dateDenaissance`, `adress`, `tel`, `numSalle`) VALUES
(7, 'bnsliman', 'amine', '2017-05-18', 'tanger', 673849263, 6),
(9, 'hmimoch', 'ali', '2022-05-26', 'tetoune', 673849263, 1),
(10, 'amhih', 'ossama', '2013-05-07', 'marakech', 673849263, 3),
(11, 'bakali', 'sanae', '2014-05-12', 'tanger', 673849263, 3),
(12, 'aznod', 'imane', '2014-05-01', 'tetoune', 673849263, 1),
(13, 'wazani', 'karim', '2012-05-23', 'marakech', 673849263, 1),
(14, 'leamrani', 'hafssa', '2014-05-01', 'fes', 673849263, 4),
(15, 'rdad', 'hamid', '2012-05-10', 'tanger', 673849263, 1),
(100, 'Amhih', 'Ossama', '2022-05-26', 'Tanger', 623900546, NULL),
(109, 'ABASS', 'YOUNESS', '2002-05-03', 'Tanger', 611875462, NULL),
(227, 'DAHRI', 'SAMA', '2001-12-02', 'Meknes', 614782547, NULL),
(404, 'awass', 'Naima', '2000-05-30', 'Agadir', 722876425, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `numSalle` int(11) NOT NULL,
  `formateur` varchar(250) DEFAULT NULL,
  `nomGroupe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`numSalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`numSalle`, `formateur`, `nomGroupe`) VALUES
(1, 'fatine', 'devlopment-legent'),
(2, 'imane', 'devlopment-a'),
(3, 'foaad', 'devlopment-b'),
(4, 'ayoub', 'devlopment-c'),
(5, 'saad', 'devlopment-d'),
(6, 'mohamed', 'devlopment-e');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etdiant`
--
ALTER TABLE `etdiant`
  ADD CONSTRAINT `numSalle` FOREIGN KEY (`numSalle`) REFERENCES `salle` (`numSalle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
