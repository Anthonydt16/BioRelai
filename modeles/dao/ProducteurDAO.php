<?php
class ProducteurDAO{



    public static function ModifCompteProducteur($id,$mdp, $adrs, $commune, $codepostal, $presentation){

        DBConnex::getInstance()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = DBConnex::getInstance()->prepare("UPDATE utilisateur SET mdpUser = :mdp WHERE idUser=:id; ");
        $requete->bindParam(":mdp",$mdp);
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

    public static function recupProduits(){

      $mail=ProducteurDAO::recupMailP();

      $requeteprepa = DBConnex::getInstance()->prepare("SELECT libelleProduit, descriptifProduit, nomCategorie FROM categories, produits
      WHERE mailProduct=:mail
      AND produits.idCategorie=categories.idCategorie;");

      $requeteprepa->bindParam(":mail",$mail['mailProduct']);
      $requeteprepa->execute();
      $requete = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
      return $requete;


    }

    public static function recupMailP(){
      $id=$_SESSION['authentification']['idUser'];
      $requeteprepa = DBConnex::getInstance()->prepare("SELECT mailProduct FROM producteur WHERE idUser=:id");
      $requeteprepa->bindParam(":id",$id);
      $requeteprepa->execute();
      $requete = $requeteprepa->fetch();
      return $requete;
    }

    public static function recupIdNom(){
      $mail=ProducteurDAO::recupMailP();

      $requeteprepa = DBConnex::getInstance()->prepare("SELECT codeProduit, libelleProduit FROM produits
      WHERE mailProduct=:mail;");

      $requeteprepa->bindParam(":mail",$mail['mailProduct']);
      $requeteprepa->execute();
      $requete = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
      return $requete;

    }





}
