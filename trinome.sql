-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 21 Juin 2023 à 18:42
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `trinome`
--

-- --------------------------------------------------------

--
-- Structure de la table `admi`
--

CREATE TABLE IF NOT EXISTS `admi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mot_de_passe` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `admi`
--

UPDATE `admi` SET `id` = 1,`nom` = 'Tagnabou',`prenom` = 'Bruno',`email` = 'brunotagnabou@gmail.com',`mot_de_passe` = 'Bruno65' WHERE `admi`.`id` = 1;
UPDATE `admi` SET `id` = 13,`nom` = 'SAWADOGO',`prenom` = 'Edwige',`email` = 'sedwige43@gmail.com',`mot_de_passe` = '1257' WHERE `admi`.`id` = 13;

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE IF NOT EXISTS `eleve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `genre` varchar(30) NOT NULL,
  `classe` varchar(30) NOT NULL,
  `numero_serie` varchar(30) NOT NULL,
  `email_parent` varchar(30) NOT NULL,
  `moyenne_1` double NOT NULL,
  `moyenne_2` double NOT NULL,
  `moyenne_3` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `eleve`
--

UPDATE `eleve` SET `id` = 1,`nom` = 'Bande',`prenom` = 'Safoura',`date_de_naissance` = '2023-06-02',`genre` = 'feminin',`classe` = 'cm2',`numero_serie` = '0545',`email_parent` = 'batia@gmail.com',`moyenne_1` = 12,`moyenne_2` = 11,`moyenne_3` = 8 WHERE `eleve`.`id` = 1;
UPDATE `eleve` SET `id` = 2,`nom` = 'Dao',`prenom` = 'Razak',`date_de_naissance` = '2023-06-01',`genre` = 'masculin',`classe` = 'cm2',`numero_serie` = '1222',`email_parent` = 'bationo@gmail.com',`moyenne_1` = 2,`moyenne_2` = 5,`moyenne_3` = 8 WHERE `eleve`.`id` = 2;

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mot_de_passe` varchar(30) NOT NULL,
  `telephone` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `parent`
--

UPDATE `parent` SET `id` = 1,`nom` = 'Batia',`prenom` = 'Samson',`email` = 'batia@gmail.com',`mot_de_passe` = 'Bruno65',`telephone` = 65179943 WHERE `parent`.`id` = 1;
UPDATE `parent` SET `id` = 2,`nom` = 'Ouedraogo',`prenom` = 'Samadou',`email` = 'bationo@gmail.com',`mot_de_passe` = '4562',`telephone` = 78800215 WHERE `parent`.`id` = 2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
