<?php
$produits = new ProduitDAO();
if(isset($_SESSION['idProduit'])){
  $quantité = $_SESSION['idProduit'];

  //ajout dans le Panier
  $adherent = new adherentDAO();
  $id = $produits->compteLeNbDeProduitCommande();
  
  $adherent->ajoutDansLePanier($id[0],$_SESSION['idProduit'],0);

   $_SESSION['idProduit'] = null;
}




require_once 'vues/adherents/vueAdherentsAchats.php' ;
