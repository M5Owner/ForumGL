-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 11 Mai 2015 à 18:13
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gl`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `cmt_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_minion` int(11) NOT NULL,
  `cmt_date` datetime NOT NULL,
  `cmt_content` varchar(1000) NOT NULL,
  PRIMARY KEY (`cmt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`cmt_id`, `id_post`, `id_minion`, `cmt_date`, `cmt_content`) VALUES
(6, 21, 19, '2015-05-07 23:28:50', 'Merci d''avoir partager la correction :)'),
(7, 25, 19, '2015-05-08 16:55:49', 'Hello pappaguena'),
(8, 23, 19, '2015-05-10 21:28:53', 'Hi this is my comment'),
(9, 28, 20, '2015-05-10 22:10:01', 'kjhbsdf');

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `file_size` decimal(4,4) DEFAULT NULL,
  PRIMARY KEY (`id_file`),
  KEY `fk_id_post` (`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `minions`
--

CREATE TABLE IF NOT EXISTS `minions` (
  `id_minion` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `enc_password` char(128) NOT NULL,
  `enc_salt` char(128) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `minion_pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_minion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `minions`
--

INSERT INTO `minions` (`id_minion`, `full_name`, `user_name`, `email`, `enc_password`, `enc_salt`, `is_admin`, `minion_pic`) VALUES
(19, 'Admin', 'M5Owner', '550hp.engine@gmail.com', '4897bccdda5ab8ad0dc445e05ba31502995bddc2a74b88a29cf3b22064c5b7a3c3bfd294073f808d3166e8dd4ee74ffff4882a3ec9ce8c9439d904bde7036f14', '491fc0408d349a9d5f9d8c9d5f5b813ad562eb10e20e6b1e84704d86672fd045677cd388273e5676126766969f51e44fafd7245bcf43a9726aa1b3284679835d', 0, NULL),
(20, 'ilyass', 'oublale', 'ilyassoublaleB@gmail.com', '9784fb4888605090352058218c2f660c832ccd6836efd00e81e0a0af66284e62444c9b920ae27344923967bd919501896265491dab0d5770bfb28f761aefd2de', '66e0829ba244db058e59fe25f4921e1a1b0f254d2e6b574bd7d0754b02996a56f0d36272da2688af8dc017836f6d7aca49f1ca1e4a3752f780258743f8286e7a', 0, NULL),
(21, 'ilyass', 'oublale', 'ilyassoublaleB@gmail.com', '139040002083f555803d1891cc8d49947238104c4d0085940d694fd01737ca37c4693d975f9b29cee4da8bb2dcb2967d13e394c395f894abcd2c99d727e378ca', '9317b166aece1d0f4ef2995cbe6878a656ca738e99ad0f625e5c3ae84849fa64682ea36d15762964a2c51aaf696ffea69776b59a829af1a3e0dd7c55a6b6dbd5', 0, NULL),
(22, 'ilyass', 'oublale', 'ilyassoublaleB@gmail.com', 'd4db8f1a0fc68492b7ac6e636ab8cf8b71b8703dcc5f39fed51840ede9c88cef29ac020bf4c8e9b006bb665979255c32850ca00f641d723889d12f53e0bec61e', 'b92b1b3318c55e4d0b75ff398de40dad126f20bd63120b7152a069d92551b00e7f33f5cdcc3d8bf5381f2b3487b51c1b0d8d09459fd1cb75cb75f6ee097266b1', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_minion` int(11) NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `pub_date` datetime NOT NULL,
  `pub_type` int(11) NOT NULL,
  `pub_subject` varchar(40) DEFAULT NULL,
  `id_file` varchar(30) DEFAULT NULL,
  `post_content` varchar(2000) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `fk_id_minion` (`id_minion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id_post`, `id_minion`, `semester`, `pub_date`, `pub_type`, `pub_subject`, `id_file`, `post_content`, `post_title`) VALUES
(21, 19, 4, '2015-05-07 23:28:00', 1, '44', '', 'Bonjour, c''est un post !\r\nwww.soufianemgani.com', 'Correction de TD'),
(22, 19, 1, '2015-05-07 23:30:53', 0, '12', '', 'Bonjour, C''est un post qui appartiens a aucune filiere', 'Un petit jeu pour s''entrainer'),
(23, 19, 2, '2015-05-07 23:33:32', 2, '24', '', 'C''est un petit', 'Minions are cool Mr Gru - Un petit cours'),
(24, 19, 6, '2015-05-07 23:35:48', 3, '65', '', 'C''est un petit text', 'Hey there! I''m using GL forum'),
(25, 19, 4, '2015-05-07 23:37:45', 3, '45', '', 'C''est un petit text', 'Forum Genie Logiciel'),
(26, 19, 2, '2015-05-07 23:39:42', 0, '21', '', '123', '123'),
(27, 19, 5, '2015-05-10 21:41:13', 1, '55', '', 'kjhbdqsfhb sdjfhjhsdqf ljksqdfjh', 'Via AKABAR'),
(28, 20, 1, '2015-05-10 22:04:17', 0, '11', '', 'hey ', ''),
(29, 20, 3, '2015-05-10 22:07:12', 0, '32', '', 'good night', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `fk_id_post` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
