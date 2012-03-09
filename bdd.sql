-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 09 Mars 2012 à 12:00
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `Ispark`
--

-- --------------------------------------------------------

--
-- Structure de la table `Parking`
--

CREATE TABLE `Parking` (
  `idparking` int(11) NOT NULL AUTO_INCREMENT,
  `nomparking` varchar(30) DEFAULT NULL,
  `adresse` varchar(30) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `logo` varchar(10) DEFAULT NULL,
  `latitude` varchar(10) NOT NULL,
  `longitude` varchar(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`idparking`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `Parking`
--

INSERT INTO `Parking` VALUES(1, 'Velizy 2', 'Centre commercial V2', '0000000000', 'velizy.png', '48.8566', '2.35222', '');
INSERT INTO `Parking` VALUES(6, 'Passy Plaza', 'Paris', '0100001111', NULL, '', '', 'Centre Commercial');
INSERT INTO `Parking` VALUES(7, 'Opera Vinci', 'Paris ', '000000000', NULL, '', '', 'Privé');

-- --------------------------------------------------------

--
-- Structure de la table `Pub`
--

CREATE TABLE `Pub` (
  `logo` varchar(10) NOT NULL,
  `logo1` varchar(10) NOT NULL,
  `url` varchar(30) NOT NULL,
  `idpub` int(11) NOT NULL,
  `idparking` varchar(3) NOT NULL,
  PRIMARY KEY (`idpub`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Pub`
--

INSERT INTO `Pub` VALUES('eez', 'zz', '&&é', 0, 'aze');

-- --------------------------------------------------------

--
-- Structure de la table `Reservation`
--

CREATE TABLE `Reservation` (
  `idreservation` int(11) NOT NULL AUTO_INCREMENT,
  `idParking` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `datedebut` date DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `temps` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  PRIMARY KEY (`idreservation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Contenu de la table `Reservation`
--

INSERT INTO `Reservation` VALUES(30, 7, 1, '0000-00-00', NULL, 1, '41422598');
INSERT INTO `Reservation` VALUES(31, 1, 1, '0000-00-00', NULL, 1, '53367581');
INSERT INTO `Reservation` VALUES(32, 7, 1, '0000-00-00', NULL, 1, '94783472');
INSERT INTO `Reservation` VALUES(33, 7, 1, '0000-00-00', NULL, 1, '26638543');
INSERT INTO `Reservation` VALUES(34, 1, 1, '0000-00-00', NULL, 1, '91957621');
INSERT INTO `Reservation` VALUES(35, 1, 1, '0000-00-00', NULL, 1, '14765078');
INSERT INTO `Reservation` VALUES(37, 1, 1, '0000-00-00', NULL, 1, '66302805');
INSERT INTO `Reservation` VALUES(38, 1, 1, '0000-00-00', NULL, 1, '71310901');
INSERT INTO `Reservation` VALUES(39, 6, 1, '0000-00-00', NULL, 1, '21678244');
INSERT INTO `Reservation` VALUES(41, 7, 1, '0000-00-00', NULL, 1, '73251131');
INSERT INTO `Reservation` VALUES(42, 6, 1, '0000-00-00', NULL, 1, '18054726');
INSERT INTO `Reservation` VALUES(43, 7, 1, '0000-00-00', NULL, 1, '71741530');
INSERT INTO `Reservation` VALUES(44, 7, 1, '0000-00-00', NULL, 1, '83185510');
INSERT INTO `Reservation` VALUES(45, 7, 1, '0000-00-00', NULL, 1, '14979198');
INSERT INTO `Reservation` VALUES(46, 7, 1, '0000-00-00', NULL, 1, '10950088');
INSERT INTO `Reservation` VALUES(47, 7, 1, '0000-00-00', NULL, 1, '94372382');
INSERT INTO `Reservation` VALUES(48, 7, 1, '0000-00-00', NULL, 1, '71671046');
INSERT INTO `Reservation` VALUES(49, 7, 1, '0000-00-00', NULL, 1, '33887112');
INSERT INTO `Reservation` VALUES(50, 7, 1, '0000-00-00', NULL, 1, '68919021');
INSERT INTO `Reservation` VALUES(51, 7, 1, '0000-00-00', NULL, 1, '59846222');
INSERT INTO `Reservation` VALUES(52, 7, 1, '0000-00-00', NULL, 1, '76705684');
INSERT INTO `Reservation` VALUES(53, 7, 1, '0000-00-00', NULL, 1, '39452100');
INSERT INTO `Reservation` VALUES(54, 7, 1, '0000-00-00', NULL, 1, '25438304');
INSERT INTO `Reservation` VALUES(55, 7, 1, '0000-00-00', NULL, 1, '31548571');
INSERT INTO `Reservation` VALUES(56, 7, 1, '0000-00-00', NULL, 1, '82927646');
INSERT INTO `Reservation` VALUES(57, 7, 1, '0000-00-00', NULL, 1, '35592144');
INSERT INTO `Reservation` VALUES(58, 7, 1, '0000-00-00', NULL, 1, '61439152');
INSERT INTO `Reservation` VALUES(59, 7, 1, '0000-00-00', NULL, 1, '64729488');
INSERT INTO `Reservation` VALUES(60, 7, 1, '0000-00-00', NULL, 1, '52944427');
INSERT INTO `Reservation` VALUES(61, 1, 1, '0000-00-00', NULL, 1, '69166733');
INSERT INTO `Reservation` VALUES(62, 1, 1, '0000-00-00', NULL, 1, '41475993');
INSERT INTO `Reservation` VALUES(63, 7, 1, '0000-00-00', NULL, 1, '85400922');
INSERT INTO `Reservation` VALUES(64, 7, 1, '0000-00-00', NULL, 1, '56824314');
INSERT INTO `Reservation` VALUES(65, 6, 1, '0000-00-00', NULL, 1, '71242366');
INSERT INTO `Reservation` VALUES(66, 1, 1, '0000-00-00', NULL, 1, '89632944');
INSERT INTO `Reservation` VALUES(67, 6, 1, '0000-00-00', NULL, 1, '71767966');
INSERT INTO `Reservation` VALUES(68, 6, 1, '0000-00-00', NULL, 1, '49387520');
INSERT INTO `Reservation` VALUES(69, 7, 1, '0000-00-00', NULL, 1, '94865587');
INSERT INTO `Reservation` VALUES(70, 7, 1, '0000-00-00', NULL, 1, '66075353');
INSERT INTO `Reservation` VALUES(71, 7, 1, '0000-00-00', NULL, 1, '52714101');
INSERT INTO `Reservation` VALUES(72, 1, 1, '0000-00-00', NULL, 1, '48438811');
INSERT INTO `Reservation` VALUES(73, 1, 1, '0000-00-00', NULL, 1, '28005433');
INSERT INTO `Reservation` VALUES(74, 7, 1, '0000-00-00', NULL, 1, '63178726');
INSERT INTO `Reservation` VALUES(75, 7, 1, '0000-00-00', NULL, 1, '67942886');
INSERT INTO `Reservation` VALUES(76, 1, 1, '0000-00-00', NULL, 1, '93793064');
INSERT INTO `Reservation` VALUES(78, 7, 1, '0000-00-00', NULL, 1, '37020147');
INSERT INTO `Reservation` VALUES(79, 7, 1, '0000-00-00', NULL, 1, '54682456');
INSERT INTO `Reservation` VALUES(81, 7, 1, '0000-00-00', NULL, 1, '72053212');
INSERT INTO `Reservation` VALUES(92, 7, 1, '0000-00-00', NULL, 1, '25311459');
INSERT INTO `Reservation` VALUES(94, 6, 1, '0000-00-00', NULL, 1, '86497830');
INSERT INTO `Reservation` VALUES(95, 6, 1, '0000-00-00', NULL, 1, '24077315');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `idutilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `datedenaissance` date DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `motdepasse` varchar(20) DEFAULT NULL,
  `imatriculation` varchar(15) NOT NULL,
  PRIMARY KEY (`idutilisateur`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` VALUES(1, '1989-09-20', 'Partouche', 'Natanel', 'partouche.ispark@gmail.com', '123.ispark', '');
INSERT INTO `Utilisateur` VALUES(88, '0000-00-00', 'Benelbaz', 'Diane', 'dianebenelbaz@hotmail.com', '123', '');
INSERT INTO `Utilisateur` VALUES(89, '2012-02-24', 'XX', 'XX', 'XX', 'XX', '');
INSERT INTO `Utilisateur` VALUES(117, '0000-00-00', 'nn', 'nn', 'nn', 'nn', '');
INSERT INTO `Utilisateur` VALUES(123, '0000-00-00', 'nn', 'nn', 'mn', 'nn', '');
INSERT INTO `Utilisateur` VALUES(127, '0000-00-00', 'nn', 'nn', 'nkn', 'nn', '');

-- --------------------------------------------------------

--
-- Structure de la table `Zone`
--

CREATE TABLE `Zone` (
  `idparking` int(3) NOT NULL,
  `zonereservable` int(3) NOT NULL,
  `zonenonreservable` int(3) NOT NULL,
  `nbrplacereservable` int(11) NOT NULL,
  `nombreplacedisponible` varchar(10) NOT NULL,
  `idzone` varchar(3) NOT NULL,
  PRIMARY KEY (`idzone`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Zone`
--

INSERT INTO `Zone` VALUES(1, 8, 0, 50, '50', '0');
