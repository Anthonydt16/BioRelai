<?php
class ProduitDAO extends PDO{
  private static $instance;

  public static function getInstance(){
      if ( !self::$instance ){
          self::$instance = new DBConnex();
      }
      return self::$instance;
  }

  public function __construct(){
      try {
          parent::__construct(Param::$dsn ,Param::$user, Param::$pass);
      }
      catch (Exception $e) {
          echo $e->getMessage();
          die("Impossible de se connecter.") ;
      }
  }
  public function affichageProduitEnvente($dateActuelle){
      $requete = DBConnex::getInstance()->prepare("SELECT p.*,c.nomCategorie,pro.communeProduct,pro.codePostalProduct,pro.adresseProduct,propo.quantite,propo.unite,propo.prix
      from produits as p, categories as c, producteur as pro, proposer as propo, ventes as V
      where c.idCategorie = p.idCategorie and propo.codeProduit = p.codeProduit and pro.mailProduct = p.mailProduct and V.idVente = propo.idVente
      and V.idVente =(
        SELECT idVente 
        from ventes
        where dateFinCli >'2021-11-03'
      	and dateVente <'2021-11-03')");
        $requete->bindParam(":dateActuelle",$dateActuelle);
        $requete->execute();
        $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
        return $donnee;
  }

  public function compteLeNbDeProduitCommander(){
      $requete = DBConnex::getInstance()->prepare("SELECT count(*) FROM `commander`");
      $requete->execute();
      $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
      return $donnee;
  }
  public function compteLeNbDeProduitCommandes(){
      $requete = DBConnex::getInstance()->prepare("SELECT count(*) FROM `commandes`");
      $requete->execute();
      $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
      return $donnee;
  }

  public static function ajouterProduit($libelle, $description, $idcategorie){
    $mail=ProducteurDAO::recupMailP();
    $requeteprepa = DBConnex::getInstance()->prepare("INSERT INTO `produits`
      (`codeProduit`, `libelleProduit`, `descriptifProduit`, `mailProduct`, `idCategorie`)
      VALUES ( null, :libelle, :descriptif, :mail, :idcat); ");
    $requeteprepa->bindParam(":mail",$mail['mailProduct']);
    $requeteprepa->bindParam(":libelle",$libelle);
    $requeteprepa->bindParam(":descriptif",$description);
    $requeteprepa->bindParam(":idcat",$idcategorie);
    $requeteprepa->execute();
  }


  public function affichageProposer(){
    $requete = DBConnex::getInstance()->prepare("  SELECT * FROM `proposer`");
    $requete->execute();
    $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
    return $donnee;
  }

  public static function supprimerProduit($id){
    $requete = DBConnex::getInstance()->prepare("DELETE FROM produits WHERE codeProduit=:id");
    $requete->bindParam(":id",$id);
    $requete->execute();

  }

  public static function supprimerProduitDuPanier($idProduit, $idCommande){
    $requete = DBConnex::getInstance()->prepare("DELETE FROM commander WHERE idCommande=:idCommande and codeProduit = :id");
    $requete->bindParam(":id",$idProduit);
    $requete->bindParam(":idCommande",$idCommande);
    $requete->execute();

  }

  public static function modifierProduit($id, $libelle, $description, $idcategorie){
    $mail=ProducteurDAO::recupMailP();
    $requeteprepa = DBConnex::getInstance()->prepare("UPDATE produits
      SET libelleProduit=:lib, descriptifProduit=:descr, idCategorie=:idcat WHERE mailProduct=:mail AND codeProduit=:id;");
    $requeteprepa->bindParam(":mail",$mail['mailProduct']);
    $requeteprepa->bindParam(":lib",$libelle);
    $requeteprepa->bindParam(":descr",$description);
    $requeteprepa->bindParam(":idcat",$idcategorie);
    $requeteprepa->bindParam(":id",$id);
    $requeteprepa->execute();
  }



      public function quantiteProduit($id){
        $requete = DBConnex::getInstance()->prepare("SELECT quantite FROM `proposer` where codeProduit = :id");
          $requete->bindParam(":id",$id);
        $requete->execute();
        $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
        return $donnee;
      }

      public function validerQuantite($id,$idCommande,$quantite){

        $requete = DBConnex::getInstance()->prepare("UPDATE `commander` SET `quantite` = :quantite WHERE `commander`.`codeProduit` = :id  and idCommande = :idCommande;");
        $requete->bindParam(":id",$id);
        $requete->bindParam(":idCommande",$idCommande);
        $requete->bindParam(":quantite",$quantite);
        $requete->execute();
      }

      public function updateQuantite($idProduit,$quantite){
        // il faut specifier l'id vente mais attendre modif de la base de données :  AND `proposer`.`idVente` = 1;
        $requete = DBConnex::getInstance()->prepare("UPDATE `proposer` SET `quantite` = :quantite WHERE `proposer`.`codeProduit` = :idProduit  ");//idCommande = :idCommande
        $requete->bindParam(":idProduit",$idProduit);
        //$requete->bindParam(":idCommande",$idCommande);
        $requete->bindParam(":quantite",$quantite);
        $requete->execute();

      }
      public function recupCommandes(){
        $requete = DBConnex::getInstance()->prepare("SELECT * FROM `Commandes`");
        $requete->execute();
        $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
        return $donnee;
      }

      public function validerPanier($idCommande){
        $requete = DBConnex::getInstance()->prepare("UPDATE `commandes` SET `Etat` = 'valider' WHERE `commandes`.`idCommande` = :idCommande;");
        $requete->bindParam(":idCommande",$idCommande);
        $requete->execute();

      }




}
 ?>
