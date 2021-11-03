<?php
include_once ('vues/vueHaut.php');

?>
<div class="conteneur">
  <?php
  if($e==1){//si il n'y a pas de ventes
      affichageProduit::afficherPasDeVente();
  }
  if($e==2){
    affichageProduit::afficherHistoriqueCommandes(VenteDAO::recupVentesPassees());
  }
  ?>
</div>
    <?php
		include_once ('vues/vueBas.php');
	?>
</div>
