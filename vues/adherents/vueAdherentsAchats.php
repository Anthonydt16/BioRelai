<?php
include_once ('vues/vueHaut.php');

?>
<div class="conteneur">
  <?php
    affichageProduit::affichageAchat($produits->affichageProduitEnvente());
  ?>
</div>
    <?php
		include_once ('vues/vueBas.php');
	?>
</div>
