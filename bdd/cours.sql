-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 17 Mars 2020 à 13:01
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cours`
--
CREATE DATABASE `cours` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cours`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nomAdmin` varchar(30) NOT NULL,
  `postnomAdmin` varchar(50) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nomAdmin`, `postnomAdmin`, `login`, `password`) VALUES
(1, 'Lucien', 'Luc', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `idComent` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `dateEnvoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idEtud` int(11) NOT NULL,
  `idEns` int(11) DEFAULT NULL,
  `reponse` text,
  `idCoursConcern` int(11) DEFAULT NULL,
  `repondu` int(11) NOT NULL,
  PRIMARY KEY (`idComent`),
  KEY `idCoursConcern` (`idCoursConcern`),
  KEY `idEtud` (`idEtud`),
  KEY `idEns` (`idEns`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`idComent`, `message`, `dateEnvoi`, `idEtud`, `idEns`, `reponse`, `idCoursConcern`, `repondu`) VALUES
(1, 'On commence les examens quand?', '2020-03-16 10:48:44', 1, 2, 'Dans une semaine		      	  				\r\n							      	  			', 4, 1),
(2, 'Un bon cours. Nous avons pas encore reÃ§u nos points des travaux', '2020-03-16 08:49:35', 1, 2, NULL, 4, 0),
(3, 'Un bon cours. Nous avons pas encore reÃ§u nos points des travaux', '2020-03-16 09:02:37', 1, 2, NULL, 4, 0),
(4, 'Un bon cours. Nous avons pas encore reÃ§u nos points des travaux', '2020-03-16 09:02:44', 1, 2, NULL, 4, 0),
(5, 'D''accord', '2020-03-16 09:01:18', 1, 2, NULL, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `idCours` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  `resume` text NOT NULL,
  `dateCreation` date NOT NULL,
  `ponderation` int(11) DEFAULT NULL,
  `heureTheorique` int(11) NOT NULL,
  `heurePratique` int(11) NOT NULL,
  `duree` int(11) NOT NULL,
  `fichierCours` varchar(255) NOT NULL,
  `debut` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `idEns` int(11) DEFAULT NULL,
  `idPromo` int(11) DEFAULT NULL,
  `statut` varchar(25) NOT NULL,
  PRIMARY KEY (`idCours`),
  KEY `idEns` (`idEns`),
  KEY `idPromo` (`idPromo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`idCours`, `designation`, `resume`, `dateCreation`, `ponderation`, `heureTheorique`, `heurePratique`, `duree`, `fichierCours`, `debut`, `fin`, `idEns`, `idPromo`, `statut`) VALUES
(4, 'Informatique de Gestion', '<h1>Introduction</h1>\n\n<p>Dans ce vours nous allons voit les diff&eacute;rentes commandes DOS que vous &ecirc;tes oblig&eacute;s de maitriser pour reussir &agrave; ce cours.</p>\n\n<p>Vous aurez &agrave; laa fin tous ce qu&#39;il vous faut. Comme par&nbsp;Exemple :&nbsp;<strong>Ordinateur,Modem,...</strong></p>\n', '2020-03-01', 80, 45, 30, 75, '1.pdf', '2020-03-01', '2020-03-31', 2, 1, 'programme'),
(5, 'Dos', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. Integer libero dolor, luctus non congue vitae, tempus ut neque. Nunc eleifend lorem quis diam pharetra sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu porttitor. In ultricies rhoncus tortor vitae tincidunt.		           			\r\n		           				           			\r\n		           		', '2020-03-01', 80, 45, 30, 75, '2.pdf', NULL, NULL, 2, 2, 'disponible'),
(6, 'Informatique de Gestion', '<h1>Introduction</h1>\n\n<p>Dans ce vours nous allons voit les diff&eacute;rentes commandes DOS que vous &ecirc;tes oblig&eacute;s de maitriser pour reussir &agrave; ce cours.</p>\n\n<p>Vous aurez &agrave; laa fin tous ce qu&#39;il vous faut. Comme par&nbsp;Exemple :&nbsp;<strong>Ordinateur,Modem,...</strong></p>\n', '2020-03-01', 60, 45, 15, 60, '1.pdf', NULL, NULL, 2, 3, 'disponible'),
(8, 'Test Cours', '<p>Test Cours</p>\r\n', '2020-03-06', 120, 12, 121, 21, '1.pdf', NULL, NULL, 2, 1, 'disponible');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `idDepartement` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`idDepartement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`idDepartement`, `designation`) VALUES
(1, 'Informatique de gestion');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
  `idEnseignant` int(11) NOT NULL AUTO_INCREMENT,
  `nomEnseignant` varchar(30) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`idEnseignant`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` (`idEnseignant`, `nomEnseignant`, `tel`, `login`, `password`) VALUES
(1, 'Lola Kamalebo', '0978563200', 'lola', '1234'),
(2, 'Mbilizi Deogratias', '0978652410', 'mbilizi', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `idEtudiant` int(11) NOT NULL AUTO_INCREMENT,
  `idDep` int(11) NOT NULL,
  `idPromo` int(11) NOT NULL,
  `matriculeEtudiant` varchar(30) DEFAULT NULL,
  `nomEtudiant` varchar(30) NOT NULL,
  `postnomEtudiant` varchar(30) NOT NULL,
  `sexeEtudiant` varchar(10) NOT NULL,
  `telEtudiant` varchar(20) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `etat` varchar(10) NOT NULL,
  PRIMARY KEY (`idEtudiant`),
  KEY `idDep` (`idDep`),
  KEY `idPromo` (`idPromo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtudiant`, `idDep`, `idPromo`, `matriculeEtudiant`, `nomEtudiant`, `postnomEtudiant`, `sexeEtudiant`, `telEtudiant`, `login`, `password`, `etat`) VALUES
(1, 1, 1, '07002', 'kika', 'Lola', 'masculin', '0978563201', 'kika', '1111', 'valide'),
(2, 1, 1, NULL, 'kalala', 'Jean', 'masculin', '0978546201', 'jean', '1234', 'invalide'),
(4, 1, 1, NULL, 'musombwa', 'Blaise', 'masculin', '0972034691', 'blaise', '1234', 'invalide');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE IF NOT EXISTS `evaluation` (
  `idEvaluation` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date NOT NULL,
  `duree` int(11) NOT NULL,
  `ext` varchar(10) NOT NULL,
  `maximum` double DEFAULT NULL,
  `typeT` varchar(20) DEFAULT NULL,
  `idEns` int(11) DEFAULT NULL,
  `idCoursConcern` int(11) DEFAULT NULL,
  `fichier` varchar(255) DEFAULT NULL,
  `statut` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idEvaluation`),
  KEY `idEns` (`idEns`),
  KEY `idCoursConcern` (`idCoursConcern`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `evaluation`
--

INSERT INTO `evaluation` (`idEvaluation`, `dateDebut`, `dateFin`, `duree`, `ext`, `maximum`, `typeT`, `idEns`, `idCoursConcern`, `fichier`, `statut`) VALUES
(1, '2020-03-08', '2020-03-08', 20, 'min', 10, 'td', 2, 4, '1.pdf', 'encours'),
(2, '2020-03-09', '2020-03-12', 3, 'jours', 20, 'tp', 2, 4, '2.pdf', 'encours');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `idPromotion` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(30) NOT NULL,
  `idDep` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPromotion`),
  KEY `idDep` (`idDep`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `promotion`
--

INSERT INTO `promotion` (`idPromotion`, `designation`, `idDep`) VALUES
(1, 'G1', 1),
(2, 'G2', 1),
(3, 'G3', 1),
(4, 'L1', 1),
(5, 'L2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
  `idReponse` int(11) NOT NULL AUTO_INCREMENT,
  `dateReponse` date DEFAULT NULL,
  `reponse` varchar(255) NOT NULL,
  `cote` double DEFAULT NULL,
  `statut` varchar(20) NOT NULL,
  `idEtud` int(11) NOT NULL,
  `idEval` int(11) NOT NULL,
  PRIMARY KEY (`idReponse`),
  KEY `idEtud` (`idEtud`),
  KEY `idEval` (`idEval`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`idReponse`, `dateReponse`, `reponse`, `cote`, `statut`, `idEtud`, `idEval`) VALUES
(1, '2020-03-09', '1.pdf', 6, 'cotee', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `suivrecours`
--

CREATE TABLE IF NOT EXISTS `suivrecours` (
  `idSuivre` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `resultatTp` double DEFAULT NULL,
  `resultatExam` double DEFAULT NULL,
  `idEtud` int(11) NOT NULL,
  `idCoursConcern` int(11) DEFAULT NULL,
  `suivi` int(11) NOT NULL,
  PRIMARY KEY (`idSuivre`),
  KEY `idCoursConcern` (`idCoursConcern`),
  KEY `idEtud` (`idEtud`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `suivrecours`
--

INSERT INTO `suivrecours` (`idSuivre`, `dateDebut`, `dateFin`, `resultatTp`, `resultatExam`, `idEtud`, `idCoursConcern`, `suivi`) VALUES
(1, '2020-03-11', '2020-03-18', 30, 25, 1, 4, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`idCoursConcern`) REFERENCES `cours` (`idCours`),
  ADD CONSTRAINT `commentaires_ibfk_3` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`idEtudiant`),
  ADD CONSTRAINT `commentaires_ibfk_4` FOREIGN KEY (`idEns`) REFERENCES `enseignant` (`idEnseignant`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`idEns`) REFERENCES `enseignant` (`idEnseignant`),
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`idPromo`) REFERENCES `promotion` (`idPromotion`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`idDep`) REFERENCES `departement` (`idDepartement`),
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`idPromo`) REFERENCES `promotion` (`idPromotion`);

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`idEns`) REFERENCES `enseignant` (`idEnseignant`),
  ADD CONSTRAINT `evaluation_ibfk_3` FOREIGN KEY (`idCoursConcern`) REFERENCES `cours` (`idCours`);

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`idDep`) REFERENCES `departement` (`idDepartement`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`idEtudiant`),
  ADD CONSTRAINT `reponse_ibfk_2` FOREIGN KEY (`idEval`) REFERENCES `evaluation` (`idEvaluation`);

--
-- Contraintes pour la table `suivrecours`
--
ALTER TABLE `suivrecours`
  ADD CONSTRAINT `suivrecours_ibfk_2` FOREIGN KEY (`idCoursConcern`) REFERENCES `cours` (`idCours`),
  ADD CONSTRAINT `suivrecours_ibfk_3` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`idEtudiant`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
