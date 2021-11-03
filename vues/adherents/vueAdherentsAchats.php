<?php
include_once ('vues/vueHaut.php');

?>
<div class="conteneur">
  <?php
    affichageProduit::affichageAchat($produits->affichageProduitEnvente(date("Y-m-d")));
    echo var_dump($produits->affichageProduitEnvente(date("Y-m-d")));
  ?>
</div>
    <?php
		include_once ('vues/vueBas.php');
	?>
</div>
