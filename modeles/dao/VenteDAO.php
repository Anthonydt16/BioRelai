<?php
class VenteDAO{

  public static function affichageVentes(){
    $requete = DBConnex::getInstance()->prepare("SELECT * FROM `ventes`");
    $requete->execute();
    $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
    return $donnee;
  }
  public static function recupIdVente($dateDebP,$dateFinP){
    $requeteprepa = DBConnex::getInstance()->prepare("SELECT idVente FROM ventes
      WHERE dateDebutProd=:dated AND dateFinProd=:datef");
    $requeteprepa->bindParam(":dated",$dateDebP);
    $requeteprepa->bindParam(":datef",$dateFinP);
    $requeteprepa->execute();
    $requete = $requeteprepa->fetch();
    return $requete['idVente'];
  }

  public static function recupProduitsProposer($idVente){
    $mail=ProducteurDAO::recupMailP();
    $requeteprepa = DBConnex::getInstance()->prepare("SELECT libelleProduit, quantite, prix, unite
       FROM produits, proposer WHERE idVente=:idVente AND mailProduct=:mail AND proposer.codeProduit=produits.codeProduit;");
    $requeteprepa->bindParam(":idVente",$idVente);
    $requeteprepa->bindParam(":mail",$mail['mailProduct']);
    $requeteprepa->execute();
    $requete = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
    return $requete;
  }

  public static function recupIdNomProdProposer($idVente){
    $mail=ProducteurDAO::recupMailP();
    $requeteprepa = DBConnex::getInstance()->prepare("SELECT produits.codeProduit,libelleProduit FROM produits, proposer
      WHERE idVente=:idVente AND mailProduct=:mail AND proposer.codeProduit=produits.codeProduit;");
    $requeteprepa->bindParam(":idVente",$idVente);
    $requeteprepa->bindParam(":mail",$mail['mailProduct']);
    $requeteprepa->execute();
    $tabS = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);

    $tablibS=array();
    $tabidS=array();
    for($i=0;$i<count($tabS);$i++) {
      $tabidS[$i]=$tabS[$i]['codeProduit'];
      $tablibS[$i]=$tabS[$i]['libelleProduit'];
    }
    $t[0]=$tabidS;
    $t[1]=$tablibS;
    return $t;

  }

  public static function recupVentesPassees(){//récupère toutes les ventes passées où le producteur a eu une commande
    $mail=ProducteurDAO::recupMailP();
    $requeteprepa = DBConnex::getInstance()->prepare("SELECT DISTINCT ventes.idVente, dateVente FROM ventes,commander,commandes,produits
      WHERE dateVente<CURRENT_DATE() AND mailProduct=:mail AND ventes.idVente=commandes.idVente
      AND commandes.idCommande=commander.idCommande AND commander.codeProduit=produits.codeProduit");
    $requeteprepa->bindParam(":mail",$mail['mailProduct']);
    $requeteprepa->execute();
    $requete = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
    return $requete;
  }



}





 ?>
