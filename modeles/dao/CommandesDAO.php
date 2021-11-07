<?php
class CommandesDAO{


  public static function recupCommandeClient($idV){
      $mail=ProducteurDAO::recupMailP();
      $requeteprepa = DBConnex::getInstance()->prepare("SELECT DISTINCT commandes.idCommande, prenomUser, nomUser FROM commander,commandes,adherent,utilisateur,produits
         WHERE idVente=:vente AND Etat='Validée' AND mailProduct=:mail AND commandes.idAdherent=adherent.idAdherent
         AND adherent.idUser=utilisateur.idUser AND commandes.idCommande=commander.idCommande
         AND commander.codeProduit=produits.codeProduit;");
      $requeteprepa->bindParam(":vente",$idV);
      $requeteprepa->bindParam(":mail",$mail['mailProduct']);
      $requeteprepa->execute();
      $requete = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
      return $requete;

  }

  public static function recupPanierClient($idCom){
    $mail=ProducteurDAO::recupMailP();
    $requeteprepa = DBConnex::getInstance()->prepare("SELECT quantite, libelleProduit FROM commander,produits
    WHERE mailProduct=:mail AND commander.codeProduit=produits.codeProduit");
    $requeteprepa->bindParam(":mail",$mail['mailProduct']);
    $requeteprepa->execute();
    $requete = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
    return $requete;
  }


  public static function recupEtatPanier($idCommandes){
    $requeteprepa = DBConnex::getInstance()->prepare("select Etat from commandes where idCommande = :idC");
    $requeteprepa->bindParam(":idC",$idCommandes);
    $requeteprepa->execute();
    $requete = $requeteprepa->fetch(PDO::FETCH_ASSOC);
    return $requete;
  }
}
