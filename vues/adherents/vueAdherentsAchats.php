<?php
include_once ('vues/vueHaut.php');

?>
<div class="conteneur">
  <?php
    affichageProduit::affichageAchat($produits->affichageProduitEnvente());
    echo var_dump($produits->affichageProduitEnvente());
  ?>
</div>
    <?php
		include_once ('vues/vueBas.php');
	?>
</div>
