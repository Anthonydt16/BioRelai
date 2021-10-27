<?php
$produits = new ProduitDAO();
$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);
if(isset($_SESSION['idProduit'])){
  $quantité = $_SESSION['idProduit'];

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
    echo $cell."teste";
    echo $value['codeProduit'];
    if($value['codeProduit'] == $_SESSION['idProduit']){
        $idvente = $value['idVente'];
  }

  }
}

  $adherent->ajoutDansLePanier(1,$_SESSION['idProduit'],0);

   $_SESSION['idProduit'] = null;
}




require_once 'vues/adherents/vueAdherentsAchats.php' ;
