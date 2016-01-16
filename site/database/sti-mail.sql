-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 16 Janvier 2016 à 14:56
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `sti-mail`
--
CREATE DATABASE IF NOT EXISTS `sti-mail` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sti-mail`;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datereception` text,
  `expeditor` text,
  `subject` text,
  `corps` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `datereception`, `expeditor`, `subject`, `corps`) VALUES
(3, '2015-12-20 14:09:00', 'rom', 'Hello', 'Coucou'),
(4, '2015-12-20 14:11:34', 'rom', 'Re', 'Yahou'),
(5, '2015-12-20 14:11:43', 'rom', 'daf', 're');

-- --------------------------------------------------------

--
-- Structure de la table `messutil`
--

CREATE TABLE IF NOT EXISTS `messutil` (
  `idutilisateur` int(11) DEFAULT NULL,
  `idmessage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messutil`
--

INSERT INTO `messutil` (`idutilisateur`, `idmessage`) VALUES
(1, 3),
(1, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text,
  `password` text,
  `enable` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `enable`, `role`) VALUES
(1, 'rom', '1d6e1cf70ec6f9ab28d3ea4b27a49a77654d370e', 1, 2),
(2, 'fa', 'eadcd9bd2a09c75aef04954e6799e50278ee124a', 1, 1),
(3, 'do', 'eadcd9bd2a09c75aef04954e6799e50278ee124a', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
