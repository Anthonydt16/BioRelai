 <?php

$adherent = new adherentDAO();
$produits = new ProduitDAO();

  if(!empty($_GET['panierValid'])){
    $tabQuantiteChoix = [];

// penser a filter la requete avec l'id de la commande
    foreach ($adherent->affichagePanierPrecis($_SESSION['idCommandes']) as $key => $value) {

      if($value['idCommande'] ==  $_SESSION['idCommandes']){
        array_push($tabQuantiteChoix,$_GET['quantite'.$value['codeProduit'].'']);
        $produits->validerQuantite($value['codeProduit'],$_SESSION['idCommandes'],$_GET['quantite'.$value['codeProduit'].'']);

        $quantitedebase=$produits->quantiteProduit($value['codeProduit'])["quantite"];

        //optimiser cette partie pour eviter si on reload la page encore une exe de la requete
        $produits->updateQuantite($value['codeProduit'],($quantitedebase - $_GET['quantite'.$value['codeProduit'].'']));
        echo $_SESSION['idCommandes'];
        $produits->validerPanier($_SESSION['idCommandes']);
    }


    }

  }
  if(!empty($_GET['suppProduit'])&&!empty($_GET['suppCommande'])){
    $produits->supprimerProduitDuPanier($_GET['suppProduit'], $_GET['suppCommande']);

    echo 'supprimer';
  }

$EnTete = array("idCommande", "nom Article", "prix unite","quantité","supprimer");
require_once 'vues/adherents/vueAdherentsPanier.php' ;
