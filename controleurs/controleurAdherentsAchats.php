<?php
$produits = new ProduitDAO();
$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);
if(isset($_SESSION['idProduit'])){
  $idPorduit = $_SESSION['idProduit'];

  //ajout dans le Panier
  $adherent = new adherentDAO();
  $idCommander = $produits->compteLeNbDeProduitCommander();
   $idCommande = $produits->compteLeNbDeProduitCommandes();
  foreach($idCommander as $key => $value) {
    $idCommander=$value;
  }
  foreach ($idCommande as $key => $value) {
    $idCommande=$value;
  }



foreach ($produits->affichageProposer() as $key1 => $value) {
  foreach ($value as $cell) {
    echo $value['codeProduit'];
    if($value['codeProduit'] == $_SESSION['idProduit']){
        $idvente = $value['idVente'];
  }

  }
}
$compteurIDCommandes = 0;
if(empty($produits->recupCommandes())){
  $adherent->ajoutdUneCommande(1,date("Y-m-d"),$UnUtilisateur->getIdUser(),$idvente);
}
foreach ($produits->recupCommandes() as $key => $value) {

  $compteurIDCommandes ++;
  //verification si il existe deja une commande a sont nom
  if($value['idAdherent'] == $UnUtilisateur->getIdUser() and $value['Etat'] != "valider"){
    break;
  }else{
    //verif si il a deja commandait le même jour /!\ attention condition si il le panier est valide le meme jours alors on cree le suivant
    if($value['dateCommande'] == date("Y-m-d") and $value['Etat'] != "valider" ){
      break;
    }
    else{
        //verifier si la crea de commande se fais bien
          $_SESSION['idCommandes'] = $compteurIDCommandes+1;
        $adherent->ajoutdUneCommande($compteurIDCommandes+1,date("Y-m-d"),$UnUtilisateur->getIdUser(),$idvente);
    }
  }


}
  $_SESSION['idCommandes'] = $compteurIDCommandes;
  echo $compteurIDCommandes."<- id commande ".$_SESSION['idProduit']." <- codeProduit ";echo "</br>";
  echo "insert into `commander`  VALUES (".$compteurIDCommandes.", ".$_SESSION['idProduit'].",:quantite)";
  $adherent->ajoutDansLePanier($compteurIDCommandes,$_SESSION['idProduit'],0);

   $_SESSION['idProduit'] = null;
}




require_once 'vues/adherents/vueAdherentsAchats.php' ;
