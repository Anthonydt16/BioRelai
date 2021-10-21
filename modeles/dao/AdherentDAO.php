<?php
class adherentDAO extends PDO{

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
  public function modificationAdherent($idUser,$mail, $prenom, $nom, $login, $mdp){
      //`mailUser``prenomUser``nomUser``mdpUser``statut``login` champs dans la requete
      $requete = DBConnex::getInstance()->prepare("  UPDATE utilisateur SET mailUser = :mail, prenomUser = :prenom, nomUser = :nom , login = :login, mdpUser = :mdp, `idUser` = :idUser WHERE idUser = :idUser; ");
      $requete->bindParam(":mail",$mail);
      $requete->bindParam(":prenom",$prenom);
      $requete->bindParam(":nom",$nom);
      $requete->bindParam(":login",$login);
      $requete->bindParam(":mdp",$mdp);
      $requete->bindParam(":idUser",$idUser);
      $requete->execute();
      return $requete;
  }
  public static function UNUtilisateurID($id){
    $requete = DBConnex::getInstance()->prepare("SELECT * FROM `utilisateur` where idUser = :id ");
    $requete->bindParam(":id",$id);
    $requete->execute();
    $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
    return $donnee;
}
public static function ajoutDansLePanier($id,$CodeProduit,$quantite){
  $requete = DBConnex::getInstance()->prepare("insert into `commander`  (:id, :CodeProduit,:quantite)");
  $requete->bindParam(":id",$id);
  $requete->bindParam(":CodeProduit",$CodeProduit);
  $requete->bindParam(":quantite",$quantite);
  $requete->execute();
}




}
