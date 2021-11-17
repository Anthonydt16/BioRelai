-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 29 Octobre 2021 à 12:10
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `biorelai`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `idAdherent` varchar(20) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idAdherent`),
  UNIQUE KEY `Adherent_Utilisateur_AK` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`idAdherent`, `idUser`) VALUES
('1', 1);
-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories`  (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(20) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `nomCategorie`) VALUES
(1, 'fruit'),
(2, 'légume'),
(3, 'fruit a coq');

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

DROP TABLE IF EXISTS `commander`;
CREATE TABLE IF NOT EXISTS `commander` (
  `idCommande` int(11) NOT NULL,
  `codeProduit` int(11) NOT NULL,
  `quantite` decimal(12,0) NOT NULL,
  PRIMARY KEY (`idCommande`,`codeProduit`),
  KEY `Commander_Produits0_FK` (`codeProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commander`
--

INSERT INTO `commander` (`idCommande`, `codeProduit`, `quantite`) VALUES
(1, 1, '0'),
(1, 2, '0'),
(1, 3, '0');
-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--


DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `idCommande` int(11) NOT NULL,
  `dateCommande` date NOT NULL,
  `idAdherent` varchar(20) NOT NULL,
  `idVente` int(11) NOT NULL,
  `Etat` varchar(20) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `Commandes_Adherent_FK` (`idAdherent`),
  KEY `Commandes_Ventes0_FK` (`idVente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `commandes` (`idCommande`, `dateCommande`, `idAdherent`, `idVente`, `Etat`) VALUES
(1, '2021-10-21', '1', 1, 'Attente'),
(2, '2021-10-26', '1', 1, 'attente');

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--


DROP TABLE IF EXISTS `producteur`;
CREATE TABLE IF NOT EXISTS `producteur` (
  `mailProduct` varchar(40) NOT NULL,
  `adresseProduct` varchar(50) NOT NULL,
  `communeProduct` varchar(20) NOT NULL,
  `codePostalProduct` varchar(40) NOT NULL,
  `presentationProduct` longtext NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`mailProduct`),
  UNIQUE KEY `Producteur_Utilisateur_AK` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `producteur`
--

INSERT INTO `producteur` (`mailProduct`, `adresseProduct`, `communeProduct`, `codePostalProduct`, `presentationProduct`, `idUser`) VALUES
('j', 'd', 'd', 'd', 'd', 8),
('test', 'n', 'n', 'n', 'n', 5),
('teste12344@gmail.com', '9 avenue victor hugo ', 'arcachon', '33120', 'je suis bg ', 2);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--



DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `codeProduit` int(11) NOT NULL AUTO_INCREMENT,
  `libelleProduit` varchar(15) NOT NULL,
  `descriptifProduit` longtext NOT NULL,
  `mailProduct` varchar(40) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`codeProduit`),
  KEY `Produits_Producteur_FK` (`mailProduct`),
  KEY `Produits_Categories0_FK` (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`codeProduit`, `libelleProduit`, `descriptifProduit`, `mailProduct`, `idCategorie`) VALUES
(1, 'banane', 'Des bananes cueillies en Dordogne', 'j', 1),
(2, 'tomate', 'une tomate du Maroc', 'j', 2),
(3, 'vfdjvjv','i', 'teste12344@gmail.com', 1),
(6, 'noix', 'c''est une noix', 'j', 3),
(10, 'cacao', 'cacao pour faire du chocolat', 'test', 3);

-- --------------------------------------------------------

--
-- Structure de la table `proposer`
--


DROP TABLE IF EXISTS `proposer`;
CREATE TABLE IF NOT EXISTS `proposer` (
  `codeProduit` int(11) NOT NULL,
  `idVente` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `unite` varchar(20) NOT NULL,
  PRIMARY KEY (`codeProduit`,`idVente`),
  KEY `Proposer_Ventes0_FK` (`idVente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `proposer` (`codeProduit`, `idVente`, `quantite`, `prix`, `unite`) VALUES
(1, 1, 20, 20, 'kg'),
(2, 2, 20, 1, 'kg'),
(3, 1, 30, 20, 'KG');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--


DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `mailUser` varchar(50) NOT NULL,
  `prenomUser` varchar(50) NOT NULL,
  `nomUser` varchar(30) NOT NULL,
  `mdpUser` varchar(30) NOT NULL,
  `statut` varchar(5) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `mailUser`, `prenomUser`, `nomUser`, `mdpUser`, `statut`, `login`) VALUES
(1, 'teste@gmail.com', 'anthony', 'douat', 'toto', '1', 'anthony'),
(2, 'teste@gmail.com', 'thomas', 'thomas', 'thomas', 'RESP', 'thomas'),
(5, 'tati@test.com', 'tati', 'tata', 'nn', 'Prod', 'tatii'),
(8, 'm@mail.com', 'm', 'm', 'm', 'Prod', 'm');

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--


DROP TABLE IF EXISTS `ventes`;
CREATE TABLE IF NOT EXISTS `ventes` (
  `idVente` int(11) NOT NULL,
  `dateVente` date NOT NULL,
  `dateDebutProd` date NOT NULL,
  `dateFinProd` date NOT NULL,
  `dateFinCli` date NOT NULL,
  PRIMARY KEY (`idVente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ventes` (`idVente`, `dateVente`, `dateDebutProd`, `dateFinProd`, `dateFinCli`) VALUES
(1, '2021-10-31', '2021-10-12', '2021-10-18', '2021-11-02'),
(2, '2021-10-24', '2021-10-11', '2021-10-21', '2021-11-01');
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `Adherent_Utilisateur_FK` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commander`
--
ALTER TABLE `commander`
  ADD CONSTRAINT `Commander_Produits0_FK` FOREIGN KEY (`codeProduit`) REFERENCES `produits` (`codeProduit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Commander_Commandes_FK` FOREIGN KEY (`idCommande`) REFERENCES `commandes` (`idCommande`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `Commandes_Ventes0_FK` FOREIGN KEY (`idVente`) REFERENCES `ventes` (`idVente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Commandes_Adherent_FK` FOREIGN KEY (`idAdherent`) REFERENCES `adherent` (`idAdherent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `producteur`
--
ALTER TABLE `producteur`
  ADD CONSTRAINT `Producteur_Utilisateur_FK` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `Produits_Categories0_FK` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Produits_Producteur_FK` FOREIGN KEY (`mailProduct`) REFERENCES `producteur` (`mailProduct`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD CONSTRAINT `Proposer_Ventes0_FK` FOREIGN KEY (`idVente`) REFERENCES `ventes` (`idVente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Proposer_Produits_FK` FOREIGN KEY (`codeProduit`) REFERENCES `produits` (`codeProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;