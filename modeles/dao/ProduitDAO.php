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
  public function affichageProduitEnvente(){
      $requete = DBConnex::getInstance()->prepare("SELECT p.*,c.nomCategorie,pro.communeProduct,pro.codePostalPoduct,pro.adresseProduct,propo.quantite,propo.unite,propo.prix  from produits as p, categories as c, producteur as pro, proposer as propo where c.idCategorie = p.idCategorie and propo.codeProduit = p.codeProduit and pro.mailProduct = p.mailProduct ");
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



}
 ?>
