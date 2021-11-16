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
  public function UNUtilisateurID($id){
    $requete = DBConnex::getInstance()->prepare("SELECT * FROM `utilisateur` where idUser = :id ");
    $requete->bindParam(":id",$id);
    $requete->execute();
    $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
    return $donnee;
}
public function ajoutDansLePanier($id,$CodeProduit,$quantite){
    $requete = DBConnex::getInstance()->prepare("insert into `commander`  VALUES (:id, :CodeProduit,:quantite)");
    $requete->bindParam(":id",$id);
    $requete->bindParam(":CodeProduit",$CodeProduit);
    $requete->bindParam(":quantite",$quantite);
    $requete->execute();


}

  public function ajoutdUneCommande($id,$dateCommande,$idAdherent,$idVente){
    $requete = DBConnex::getInstance()->prepare("INSERT INTO `commandes` (`idCommande`, `dateCommande`, `idAdherent`, `idVente`, `Etat`) VALUES (:id, :dateCommande, :idAdherent, :idVente, 'Attente')");
    $requete->bindParam(":id",$id);
    $requete->bindParam(":dateCommande",$dateCommande);
    $requete->bindParam(":idAdherent",$idAdherent);
    $requete->bindParam(":idVente",$idVente);
    $requete->execute();
  }


  public function affichagePanier($idCommande){
      $requete = DBConnex::getInstance()->prepare("SELECT c.idCommande ,p.libelleProduit,propo.prix, c.quantite ,c.codeProduit, propo.idVente FROM `commander` as c, proposer as propo, commandes as co, produits as p where co.idCommande = c.idCommande and p.codeProduit = c.codeProduit and c.idCommande = :idc GROUP BY p.codeProduit");
      $requete->bindParam(":idc",$idCommande);
      $requete->execute();

      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
  }
  public function affichagePanierPrecis($idCommande){
      $requete = DBConnex::getInstance()->prepare("SELECT * FROM `commander` where idCommande = :id");
      $requete->bindParam(":id",$idCommande);
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
  }

  public function validationcommande(){
    $requete = DBConnex::getInstance()->prepare("INSERT INTO `commandes` (`idCommande`, `dateCommande`, `idAdherent`, `idVente`, `Etat`) VALUES (:id, :dateCommande, :idAdherent, :idVente, 'Attente')");
    $requete->bindParam(":id",$id);
    $requete->bindParam(":dateCommande",$dateCommande);
    $requete->bindParam(":idAdherent",$idAdherent);
    $requete->bindParam(":idVente",$idVente);
    $requete->execute();
  }

  public function facture($idAdherent){
    $requete = DBConnex::getInstance()->prepare("SELECT co.Etat,c.idCommande ,p.libelleProduit,propo.prix, c.quantite ,c.codeProduit, co.dateCommande FROM `commander` as c, proposer as propo, commandes as co, produits as p where co.idCommande = c.idCommande and p.codeProduit = c.codeProduit and co.Etat = 'validee' and co.idAdherent =:idAdherent GROUP BY co.idCommande,p.codeProduit");
    $requete->bindParam(":idAdherent",$idAdherent);
    $requete->execute();
    $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
    return $donnee;
    }
}
