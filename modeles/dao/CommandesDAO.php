<?php
class CommandesDAO{

  public static function recupCommandesEnCours($idV){
      $requeteprepa = DBConnex::getInstance()->prepare("SELECT prenomUser, nomUser, quantite, libelleProduit FROM commander,commandes,adherent,utilisateur,produits
         WHERE idVente='1' AND Etat='Validée' AND commandes.idAdherent=adherent.idAdherent
         AND adherent.idUser=utilisateur.idUser AND commandes.idCommande=commander.idCommande
         AND commander.codeProduit=produits.codeProduit;");
      //$requeteprepa->bindParam(":vente",$idV);
      $requeteprepa->execute();
      $requete = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
      // var_dump($requete);
      // $t=array();
      // $j=0;
      //
      // $tabQuantite=array();
      // $tabLibelle=array();
      // for($i=0;$i<count($requete);$i++){
      //   $tabQuantite[$i]=$requete[$i]['quantite'];
      //   $tabLibelle[$i]=$requete[$i]['libelleProduit'];
      // }
      // $t=['prenom' => $requete[0]['prenomUser'], 'nom' => $requete[0]['nomUser'],
      // 'quantite' =>$tabQuantite, 'produits' => $tabLibelle];
      // return $t;
      return $requete;

  }
}
