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

    public static function venteDispo(){
      $requeteprepa = DBConnex::getInstance()->prepare("SELECT dateDebutProd, dateFinProd FROM ventes");
      $requeteprepa->execute();
      $ventes = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
      $date=ProducteurDAO::laDate();
      foreach($ventes as $vente){
        if($date <= $vente['dateFinProd'] && $date >= $vente['dateDebutProd']){
          return ['bool' => True, 'debut' => $vente['dateDebutProd'], 'fin' => $vente['dateFinProd']];
        }
      }
      return False;

    }

    public static function laDate(){
      $requeteprepa = DBConnex::getInstance()->prepare("SELECT CURRENT_DATE()");
      $requeteprepa->execute();
      $requete = $requeteprepa->fetch();
      return $requete['CURRENT_DATE()'];
    }

    public static function proposer($produit,$vente,$quantite,$prix,$unite){
      $requeteprepa = DBConnex::getInstance()->prepare("INSERT INTO proposer
        VALUES(:produit,:vente,:quantite,:prix,:unite) ");
      $requeteprepa->bindParam(":produit",$produit);
      $requeteprepa->bindParam(":vente",$vente);
      $requeteprepa->bindParam(":quantite",$quantite);
      $requeteprepa->bindParam(":prix",$prix);
      $requeteprepa->bindParam(":unite",$unite);
      $requeteprepa->execute();
    }

    public static function suppProposer($idV,$idProduit){
      $requeteprepa = DBConnex::getInstance()->prepare("DELETE FROM proposer
        WHERE codeProduit=:produit AND idVente=:vente;");
      $requeteprepa->bindParam(":vente",$idV);
      $requeteprepa->bindParam(":produit",$idProduit);
      $requeteprepa->execute();
    }

    public static function modifProposer($produit,$vente,$quantite,$prix,$unite){
      $requeteprepa = DBConnex::getInstance()->prepare("UPDATE proposer
        SET quantite=:quantite, prix=:prix, unite=:unite WHERE codeProduit=:produit AND idVente=:vente;");
      $requeteprepa->bindParam(":produit",$produit);
      $requeteprepa->bindParam(":vente",$vente);
      $requeteprepa->bindParam(":quantite",$quantite);
      $requeteprepa->bindParam(":prix",$prix);
      $requeteprepa->bindParam(":unite",$unite);
      $requeteprepa->execute();
    }

    public static function venteTermine(){
      $date=ProducteurDAO::laDate();
      $requeteprepa = DBConnex::getInstance()->prepare("SELECT MIN(dateVente) AS mdate FROM ventes;");
      $requeteprepa->execute();
      $mdate = $requeteprepa->fetch(PDO::FETCH_ASSOC);
      if($mdate['mdate']<$date){
        return True;
      }
      else {
        return False;
      }

    }





}
