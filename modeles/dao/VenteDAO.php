<?php
class VenteDAO{


  public static function recupIdVente($dateDebP,$dateFinP){
    $requeteprepa = DBConnex::getInstance()->prepare("SELECT idVente FROM ventes
      WHERE dateDebutProd=:dated AND dateFinProd=:datef");
    $requeteprepa->bindParam(":dated",$dateDebP);
    $requeteprepa->bindParam(":datef",$dateFinP);
    $requeteprepa->execute();
    $requete = $requeteprepa->fetch();
    return $requete['idVente'];
  }





}





 ?>
