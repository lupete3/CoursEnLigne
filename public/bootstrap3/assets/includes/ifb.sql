-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 12 Février 2019 à 06:44
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ifb`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `CodeClasse` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CodeProv` int(11) NOT NULL,
  PRIMARY KEY (`CodeClasse`),
  KEY `CLASSE_PROVISEUR_FK` (`CodeProv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`CodeClasse`, `Designation`, `Section`, `CodeProv`) VALUES
(1, '1ere', 'C.O/A', 1),
(2, '1ere', 'C.O/B', 1),
(3, '2eme', 'C.O/A', 1),
(4, '2eme', 'C.O/B', 1),
(5, '2eme', 'C.O/C', 1),
(6, '3eme', 'Commerciale de gestion', 1);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE IF NOT EXISTS `eleve` (
  `CodeEleve` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postnom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `origine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_p` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_m` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CodeEleve`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `eleve`
--

INSERT INTO `eleve` (`CodeEleve`, `nom`, `postnom`, `prenom`, `sexe`, `lieu`, `date`, `adresse`, `origine`, `nom_p`, `nom_m`, `prov`, `num`, `password`) VALUES
(1, 'Akilimali', 'Yoshua', 'Blaise', 'Masculin', 'Bukavu', '14/10/1996', 'Rukumbuka No. 19L', 'Uvira', 'Vijey', 'Dorcas', 'E.P. Bukavu', '+23851793388', 'josh'),
(2, 'Zezi', 'Mulume', 'Vanessa', 'Feminin', 'Bukavu', '10/09/1998', 'Mukukwe', 'Ngweshe', 'Mulume', 'Bibiche', 'Edap/ISP', '+243976675922', 'vanb'),
(3, 'Onya', 'Koy', 'Anselme', 'Masculin', 'Goma', '18/10/1996', 'Labotte', 'Katakokombe', 'Koy Daniel', 'Viviane', 'E.P Uvira', '+243898551395', 'sunkoy'),
(4, 'Esther', 'Akilimali', 'Gloria', 'Feminin', 'Bukavu', '23/08/1995', 'Rukumbuka No. 19L', 'Uvira', 'Vijey', 'Dorcas', 'E.P. Bukavu', '+243898648381', 'esty');

-- --------------------------------------------------------

--
-- Structure de la table `inscrire`
--

CREATE TABLE IF NOT EXISTS `inscrire` (
  `idInscription` int(11) NOT NULL AUTO_INCREMENT,
  `CodeEleve` int(11) NOT NULL,
  `DateInscription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Classe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Dossier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `AnneeScol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Etat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idInscription`),
  UNIQUE KEY `CodeEleve` (`CodeEleve`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `inscrire`
--


-- --------------------------------------------------------

--
-- Structure de la table `proviseur`
--

CREATE TABLE IF NOT EXISTS `proviseur` (
  `CodeProv` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PostNom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CodeProv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `proviseur`
--

INSERT INTO `proviseur` (`CodeProv`, `Nom`, `PostNom`, `Phone`, `Password`) VALUES
(1, 'Samuel', 'Vijey', '+243858999623', 'sam');
