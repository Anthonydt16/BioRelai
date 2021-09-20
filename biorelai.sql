-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 20 sep. 2021 à 11:59
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
-- Base de données : `biorelai`
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

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(11) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`idCommande`),
  KEY `Commandes_Adherent_FK` (`idAdherent`),
  KEY `Commandes_Ventes0_FK` (`idVente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--

DROP TABLE IF EXISTS `producteur`;
CREATE TABLE IF NOT EXISTS `producteur` (
  `mailProduct` varchar(40) NOT NULL,
  `mdpProduct` varchar(30) NOT NULL,
  `adresseProduct` varchar(50) NOT NULL,
  `communeProduct` varchar(20) NOT NULL,
  `codePostalPoduct` varchar(40) NOT NULL,
  `presentationProduct` longtext NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`mailProduct`),
  UNIQUE KEY `Producteur_Utilisateur_AK` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `codeProduit` int(11) NOT NULL AUTO_INCREMENT,
  `libelleProduit` varchar(15) NOT NULL,
  `mailProduct` varchar(40) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`codeProduit`),
  KEY `Produits_Producteur_FK` (`mailProduct`),
  KEY `Produits_Categories0_FK` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `mailUser`, `prenomUser`, `nomUser`, `mdpUser`, `statut`, `login`) VALUES
(1, 'teste@gmail.com', 'anthony', 'douat', 'toto', '1', 'anthony'),
(2, 'teste@gmail.com', 'thomas', 'thomas', 'thomas', '1', 'toto');

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

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `Adherent_Utilisateur_FK` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`);

--
-- Contraintes pour la table `commander`
--
ALTER TABLE `commander`
  ADD CONSTRAINT `Commander_Commandes_FK` FOREIGN KEY (`idCommande`) REFERENCES `commandes` (`idCommande`),
  ADD CONSTRAINT `Commander_Produits0_FK` FOREIGN KEY (`codeProduit`) REFERENCES `produits` (`codeProduit`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `Commandes_Adherent_FK` FOREIGN KEY (`idAdherent`) REFERENCES `adherent` (`idAdherent`),
  ADD CONSTRAINT `Commandes_Ventes0_FK` FOREIGN KEY (`idVente`) REFERENCES `ventes` (`idVente`);

--
-- Contraintes pour la table `producteur`
--
ALTER TABLE `producteur`
  ADD CONSTRAINT `Producteur_Utilisateur_FK` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `Produits_Categories0_FK` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`idCategorie`),
  ADD CONSTRAINT `Produits_Producteur_FK` FOREIGN KEY (`mailProduct`) REFERENCES `producteur` (`mailProduct`);

--
-- Contraintes pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD CONSTRAINT `Proposer_Produits_FK` FOREIGN KEY (`codeProduit`) REFERENCES `produits` (`codeProduit`),
  ADD CONSTRAINT `Proposer_Ventes0_FK` FOREIGN KEY (`idVente`) REFERENCES `ventes` (`idVente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
