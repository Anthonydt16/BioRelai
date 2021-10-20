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
      return $requete;
  }

}
 ?>