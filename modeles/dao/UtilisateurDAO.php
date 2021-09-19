<?php
class UtilisateurDAO{
  public function __construct(){
      }
   function UNUtilisateur($login){
     $result =[];
     $requete = DBConnex::getInstance()->prepare("SELECT * FROM `utilisateur` where login = :login ");
     $requete->bindParam(":login",$login);
     $requete->execute();
     $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
     return $donnee;
 }



}
