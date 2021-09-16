#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        idUser     Int  Auto_increment  NOT NULL ,
        mailUser   Varchar (50) NOT NULL ,
        prenomUser Varchar (50) NOT NULL ,
        nomUser    Varchar (30) NOT NULL ,
        mdpUser    Varchar (30) NOT NULL ,
        statut     Varchar (5) NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (idUser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Producteur
#------------------------------------------------------------

CREATE TABLE Producteur(
        mailProduct         Varchar (40) NOT NULL ,
        mdpProduct          Varchar (30) NOT NULL ,
        adresseProduct      Varchar (50) NOT NULL ,
        communeProduct      Varchar (20) NOT NULL ,
        codePostalPoduct    Varchar (40) NOT NULL ,
        presentationProduct Longtext NOT NULL ,
        idUser              Int NOT NULL
	,CONSTRAINT Producteur_PK PRIMARY KEY (mailProduct)

	,CONSTRAINT Producteur_Utilisateur_FK FOREIGN KEY (idUser) REFERENCES Utilisateur(idUser)
	,CONSTRAINT Producteur_Utilisateur_AK UNIQUE (idUser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Ventes
#------------------------------------------------------------

CREATE TABLE Ventes(
        idVente       Int NOT NULL ,
        dateVente     Date NOT NULL ,
        dateDebutProd Date NOT NULL ,
        dateFinProd   Date NOT NULL ,
        dateFinCli    Date NOT NULL
	,CONSTRAINT Ventes_PK PRIMARY KEY (idVente)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Adherent
#------------------------------------------------------------

CREATE TABLE Adherent(
        idAdherent Varchar (20) NOT NULL ,
        idUser     Int NOT NULL
	,CONSTRAINT Adherent_PK PRIMARY KEY (idAdherent)

	,CONSTRAINT Adherent_Utilisateur_FK FOREIGN KEY (idUser) REFERENCES Utilisateur(idUser)
	,CONSTRAINT Adherent_Utilisateur_AK UNIQUE (idUser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commandes
#------------------------------------------------------------

CREATE TABLE Commandes(
        idCommande   Int NOT NULL ,
        dateCommande Date NOT NULL ,
        idAdherent   Varchar (20) NOT NULL ,
        idVente      Int NOT NULL
	,CONSTRAINT Commandes_PK PRIMARY KEY (idCommande)

	,CONSTRAINT Commandes_Adherent_FK FOREIGN KEY (idAdherent) REFERENCES Adherent(idAdherent)
	,CONSTRAINT Commandes_Ventes0_FK FOREIGN KEY (idVente) REFERENCES Ventes(idVente)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Categories
#------------------------------------------------------------

CREATE TABLE Categories(
        idCategorie  Int NOT NULL ,
        nomCategorie Varchar (11) NOT NULL
	,CONSTRAINT Categories_PK PRIMARY KEY (idCategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Produits
#------------------------------------------------------------

CREATE TABLE Produits(
        codeProduit    Int  Auto_increment  NOT NULL ,
        libelleProduit Varchar (15) NOT NULL ,
        mailProduct    Varchar (40) NOT NULL ,
        idCategorie    Int NOT NULL
	,CONSTRAINT Produits_PK PRIMARY KEY (codeProduit)

	,CONSTRAINT Produits_Producteur_FK FOREIGN KEY (mailProduct) REFERENCES Producteur(mailProduct)
	,CONSTRAINT Produits_Categories0_FK FOREIGN KEY (idCategorie) REFERENCES Categories(idCategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commander
#------------------------------------------------------------

CREATE TABLE Commander(
        idCommande  Int NOT NULL ,
        codeProduit Int NOT NULL ,
        quantite    Decimal (12) NOT NULL
	,CONSTRAINT Commander_PK PRIMARY KEY (idCommande,codeProduit)

	,CONSTRAINT Commander_Commandes_FK FOREIGN KEY (idCommande) REFERENCES Commandes(idCommande)
	,CONSTRAINT Commander_Produits0_FK FOREIGN KEY (codeProduit) REFERENCES Produits(codeProduit)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Proposer
#------------------------------------------------------------

CREATE TABLE Proposer(
        codeProduit Int NOT NULL ,
        idVente     Int NOT NULL ,
        quantite    Int NOT NULL ,
        prix        Int NOT NULL ,
        unite       Varchar (20) NOT NULL
	,CONSTRAINT Proposer_PK PRIMARY KEY (codeProduit,idVente)

	,CONSTRAINT Proposer_Produits_FK FOREIGN KEY (codeProduit) REFERENCES Produits(codeProduit)
	,CONSTRAINT Proposer_Ventes0_FK FOREIGN KEY (idVente) REFERENCES Ventes(idVente)
)ENGINE=InnoDB;

