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
      $id=$_SESSION['authentification']['idUser'];

      $requeteprepa = DBConnex::getInstance()->prepare("SELECT libelleProduit, descriptifProduit, nomCategorie FROM categories, produits
      WHERE produits.mailProduct=(SELECT mailProduct FROM utilisateur WHERE idUser=:id)
      AND produits.idCategorie=categories.idCategorie;");

      $requeteprepa = bindParam(":id",$id);
      $requetePrepa->execute();
      $requete = $requetePrepa->fetchAll(PDO::FETCH_ASSOC);
      return $requete;


    }







}
