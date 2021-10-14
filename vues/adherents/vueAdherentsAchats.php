<?php
include_once ('vues/vueHaut.php');

?>
<div class="conteneur">
  <?php
    affichageProduit::affichageAchat($produits->affichageProduitEnvente());
  ?>
  <i class="fas fa-bus"></i>
</div>
    <?php
		include_once ('vues/vueBas.php');
	?>
</div>
