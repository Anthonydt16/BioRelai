<?php

if(isset($_SESSION['idProduit'])){
  $quantité = $_SESSION['idProduit'];
  $_SESSION['idProduit'] = null;
  echo "teste";
}
$produits = new ProduitDAO();



require_once 'vues/adherents/vueAdherentsAchats.php' ;
