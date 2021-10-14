<?php
class BioRelaiDAO{
  public function __construct(){
      }
   public static function UNUtilisateur($login, $mdp){
     $requete = DBConnex::getInstance()->prepare("SELECT * FROM `utilisateur` where login = :login and mdpUser = :mdp ");
     $requete->bindParam(":login",$login);
     $requete->bindParam(":mdp",$mdp);
     $requete->execute();
     $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
     return $donnee;
 }

   public static function AjoutUtilisateur($mailUser,$prenomUser,$nomUser,$mdpUser,$loginUser,$statut){
     $requete = DBConnex::getInstance()->prepare("INSERT INTO `utilisateur` (`mailUser`, `prenomUser`, `nomUser`, `mdpUser`, `statut`, `login`) VALUES ( :mail, :prenom, :nom, :mdp, :statut, :login);");
     $requete->bindParam(":mail",$mailUser);
     $requete->bindParam(":prenom",$prenomUser);
     $requete->bindParam(":nom",$nomUser);
     $requete->bindParam(":mdp",$mdpUser);
     $requete->bindParam(":login",$loginUser);
     $requete->bindParam(":statut",$statut);
     $requete->execute();



   }



}
