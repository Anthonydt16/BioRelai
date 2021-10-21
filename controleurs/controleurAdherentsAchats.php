<?php

if(!empty($_SESSION['selectChoixq'])){
  //on recup la quantite
  echo $_SESSION['selectChoixq'];
  $quantité = $_SESSION['selectChoixq'];
  // et on la supprime
  $_SESSION['selectChoixq'] = [];
}
$produits = new ProduitDAO();



require_once 'vues/adherents/vueAdherentsAchats.php' ;
