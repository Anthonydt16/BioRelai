<?php
class BioRelaiDAO{
  public function __construct(){
      }
   public static function UNUtilisateur($login, $mdp){
     $requete = DBConnex::getInstance()->prepare("SELECT * FROM `utilisateur` where login = :login and mdpUser = :mdp ");
     $requete->bindParam(":login",$login);
     $requete->bindParam(":mdp",$mdp);
     $requete->execute();
     $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
     return $donnee;
 }

   public static function AjoutUtilisateur($mailUser,$prenomUser,$nomUser,$mdpUser,$loginUser,$statut){
     $requete = DBConnex::getInstance()->prepare("INSERT INTO `utilisateur` (`mailUser`, `prenomUser`, `nomUser`, `mdpUser`, `statut`, `login`) VALUES ( :mail, :prenom, :nom, :mdp, :statut, :login);");
     $requete->bindParam(":mail",$mailUser);
     $requete->bindParam(":prenom",$prenomUser);
     $requete->bindParam(":nom",$nomUser);
     $requete->bindParam(":mdp",$mdpUser);
     $requete->bindParam(":login",$loginUser);
     $requete->bindParam(":statut",$statut);
     $requete->execute();



   }



   public static function ModifCompteBioRelai($mdpUser,$login,$idUser){
     $requete = DBConnex::getInstance()->prepare("UPDATE `utilisateur`  SET mdpuser = :mdp, login= :login WHERE idUser = :idUser; ");
     $requete->bindParam(":mdp",$mdpUser);
     $requete->bindParam(":login",$login);
     $requete->bindParam(":idUser",$idUser);
     $requete->execute();



   }

   public static function AjouterNouvelleVente($date,$dateDebProd,$dateFinProd,$dateFinCli){
     $requete = DBConnex::getInstance()->prepare("INSERT INTO `ventes`(`idVente`, `dateVente`, `dateDebutProd`, `dateFinProd`, `dateFinCli`) VALUES ((SELECT * FROM(SELECT MAX(idVente)+1 FROM ventes) AS maxid),:dateVente,:dateDebProd,:dateFinProd,:dateFinCli)");
     $requete->bindParam(":dateVente",$date);
     $requete->bindParam(":dateDebProd",$dateDebProd);
     $requete->bindParam(":dateFinProd",$dateFinProd);
     $requete->bindParam(":dateFinCli",$dateFinCli);
     $requete->execute();



   }

   public static function AjouterNouveauProduit($nom){
     $requete = DBConnex::getInstance()->prepare("INSERT INTO `categories`(`idCategorie`, `nomCategorie`) VALUES ((SELECT * FROM(SELECT MAX(idCategorie)+1 FROM categories) AS maxid),:nomCategorie)");
     $requete->bindParam(":nomCategorie",$nom);
     $requete->execute();



   }

   public static function ModifCompteProducteur($id,$mdp,$login, $adrs, $commune, $codepostal, $presentation){

       DBConnex::getInstance()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $requete = DBConnex::getInstance()->prepare("UPDATE utilisateur SET mdpUser  = :mdp, login= :login WHERE idUser=:id; ");
       $requete->bindParam(":mdp",$mdp);
       $requete->bindParam(":login",$login);
       $requete->bindParam(":id",$id);
       //$requete->execute();


       $requete2 = DBConnex::getInstance()->prepare("UPDATE producteur SET adresseProduct = :adrs, communeProduct = :commune, codePostalProduct = :cp, presentationProduct = :presentation
       WHERE producteur.idUser=:id; ");
       $requete2->bindParam(":adrs",$adrs);
       $requete2->bindParam(":id",$id);
       $requete2->bindParam(":commune",$commune);
       $requete2->bindParam(":cp",$codepostal);
       $requete2->bindParam(":presentation",$presentation);
       //$requete2->execute();


       DBConnex::getInstance()->beginTransaction();
           $requete->execute();
           $requete2->execute();
       DBConnex::getInstance()->commit();
   }

   public static function AjouterCompteProducteur($mail,$prenom,$nom,$mdp,$login, $adrs, $commune, $codepostal, $presentation){

       DBConnex::getInstance()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       //requete avec double imbrication pour récuperer la valeur maximale de l'idUser
       $requete = DBConnex::getInstance()->prepare("INSERT INTO `utilisateur`(`idUser`, `mailUser`, `prenomUser`, `nomUser`, `mdpUser`, `statut`, `login`) VALUES ((SELECT * FROM(SELECT MAX(idUser)+1 FROM utilisateur) AS maxid),:mail,:prenom,:nom,:mdp,'Prod',:login)");
       $requete->bindParam(":mail",$mail);
       $requete->bindParam(":prenom",$prenom);
       $requete->bindParam(":nom",$nom);
       $requete->bindParam(":mdp",$mdp);
       $requete->bindParam(":login",$login);
       //$requete->execute();

       //requete avec imbrication pour récuperer la valeur maximale de l'idUser dans utilisateur
       $requete2 = DBConnex::getInstance()->prepare("INSERT INTO `producteur`(`mailProduct`,`adresseProduct`, `communeProduct`, `codePostalProduct`, `presentationProduct`, `idUser`) VALUES (:mailProduct,:adrs,:commune,:cp,:presentation, (SELECT MAX(idUser) FROM utilisateur WHERE statut = 'Prod'))");
       $requete2->bindParam(":mailProduct",$mail);
       $requete2->bindParam(":adrs",$adrs);
       $requete2->bindParam(":commune",$commune);
       $requete2->bindParam(":cp",$codepostal);
       $requete2->bindParam(":presentation",$presentation);
       //$requete2->execute();


       DBConnex::getInstance()->beginTransaction();
           $requete->execute();
           $requete2->execute();
       DBConnex::getInstance()->commit();
   }

   public static function DeleteCompteProducteur($idUser){
     $requete = DBConnex::getInstance()->prepare("DELETE FROM `utilisateur` WHERE idUser = :idUser ");
     $requete->bindParam(":idUser",$idUser);
     $requete->execute();



   }

   public static function AfficherCommande($idVente){
     $requete = DBConnex::getInstance()->prepare("SELECT * FROM `commandes`");
     $requete->bindParam(":idVente",$idVente);
     $requete->execute();



   }

   public static function DeleteVente($idVente){
     $requete = DBConnex::getInstance()->prepare("DELETE FROM `ventes` WHERE idVente = :idVente ");
     $requete->bindParam(":idVente",$idVente);
     $requete->execute();



   }

   public static function ModifVentes($idVente,$dateVente,$dateDebutProd,$dateFinProd,$dateFinCli){
     $requete = DBConnex::getInstance()->prepare("UPDATE `ventes`  SET dateVente = :dateVente, dateDebutProd= :dateDebutProd, dateFinProd= :dateFinProd, dateFinCli= :dateFinCli WHERE idVente = :idVente; ");
     $requete->bindParam(":idVente",$idVente);
     $requete->bindParam(":dateVente",$dateVente);
     $requete->bindParam(":dateDebutProd",$dateDebutProd);
     $requete->bindParam(":dateFinProd",$dateFinProd);
     $requete->bindParam(":dateFinCli",$dateFinCli);
     $requete->execute();



   }

   public static function recupCodeProd(){
     $requeteprepa = DBConnex::getInstance()->prepare("SELECT idUser FROM utilisateur WHERE statut = 'Prod'");
     $requeteprepa->execute();
     $requete = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
     return $requete;

   }

   public static function recupNomProd(){
     $requeteprepa = DBConnex::getInstance()->prepare("SELECT login FROM utilisateur WHERE statut = 'Prod'");
     $requeteprepa->execute();
     $requete = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
     return $requete;

   }

   public static function recupCodeVente(){
     $requeteprepa = DBConnex::getInstance()->prepare("SELECT idVente FROM ventes");
     $requeteprepa->execute();
     $requete = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
     return $requete;

   }

   public static function recupDateVente(){
     $requeteprepa = DBConnex::getInstance()->prepare("SELECT dateVente FROM ventes");
     $requeteprepa->execute();
     $requete = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
     return $requete;

   }

}
