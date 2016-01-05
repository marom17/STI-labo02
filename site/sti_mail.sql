-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 05 Janvier 2016 à 09:21
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sti_mail`
--
CREATE DATABASE IF NOT EXISTS `sti_mail` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sti_mail`;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datereception` text,
  `expeditor` text,
  `subject` text,
  `corps` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `datereception`, `expeditor`, `subject`, `corps`) VALUES
(3, '2016-01-05 09:05:29', 'rom', 'Salut', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu nisi id elit posuere fermentum vitae in sem. Morbi sagittis quis felis in tristique. Integer sollicitudin velit vel consectetur auctor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pretium, magna sed pulvinar pellentesque, tortor tellus tempor ligula, et commodo diam velit sit amet dui. Fusce molestie lacus sem, ac gravida diam tristique eget. Suspendisse vestibulum magna suscipit rhoncus lacinia. Vestibulum rhoncus lacus at justo semper facilisis.'),
(4, '2016-01-05 09:05:29', 'rom', 'Salut', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu nisi id elit posuere fermentum vitae in sem. Morbi sagittis quis felis in tristique. Integer sollicitudin velit vel consectetur auctor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pretium, magna sed pulvinar pellentesque, tortor tellus tempor ligula, et commodo diam velit sit amet dui. Fusce molestie lacus sem, ac gravida diam tristique eget. Suspendisse vestibulum magna suscipit rhoncus lacinia. Vestibulum rhoncus lacus at justo semper facilisis.'),
(5, '2016-01-05 09:05:51', 'fa', 'Coucou', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu nisi id elit posuere fermentum vitae in sem. Morbi sagittis quis felis in tristique. Integer sollicitudin velit vel consectetur auctor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pretium, magna sed pulvinar pellentesque, tortor tellus tempor ligula, et commodo diam velit sit amet dui. Fusce molestie lacus sem, ac gravida diam tristique eget. Suspendisse vestibulum magna suscipit rhoncus lacinia. Vestibulum rhoncus lacus at justo semper facilisis.'),
(6, '2016-01-05 09:09:05', 'fa', 'Injection', '<script type="text/javascript">alert(''Faille'');</script>');

-- --------------------------------------------------------

--
-- Structure de la table `messutil`
--

DROP TABLE IF EXISTS `messutil`;
CREATE TABLE IF NOT EXISTS `messutil` (
  `idutilisateur` int(11) DEFAULT NULL,
  `idmessage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messutil`
--

INSERT INTO `messutil` (`idutilisateur`, `idmessage`) VALUES
(2, 3),
(4, 4),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
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

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text,
  `password` text,
  `enable` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `enable`, `role`) VALUES
(1, 'rom', '9ba5081c344fa4673d988c46d20cea1ae550a517', 1, 2),
(2, 'fa', 'eadcd9bd2a09c75aef04954e6799e50278ee124a', 1, 1),
(3, 'ta', '41c76e5218177bb90eb3d29d24da7b418a07d440', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
