 <?php

$adherent = new adherentDAO();
$produits = new ProduitDAO();

  if(!empty($_GET['quantite1'])){
    $tabQuantiteChoix = [];

    for ($i=1; $i <count($adherent->affichagePanier())+1 ; $i++) {
        array_push($tabQuantiteChoix,$_GET['quantite'.$i.'']);
    }
  }
  if(!empty($_GET['panierValid'])){
    echo "valider";
    
  }

$EnTete = array("produit", "prix unité", "quantité","supprimer");
require_once 'vues/adherents/vueAdherentsPanier.php' ;
