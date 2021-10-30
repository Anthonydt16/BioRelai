<?php
include_once ('vues/vueHaut.php');

?>
<div class="conteneur">
  <?php
  if($e==1){//si il n'y a pas de ventes
      affichageProduit::afficherPasDeVente();
  }
  ?>
  <main>
  <div id="texteBienvenue" class="card" style="width: 80%;">
      <div class='titre'><h5>Proposer à la vente un Produit</h5></div>
        <div class="card-body">
        <div class="form-group">
            <?php
              $formulaireProposerProduit->afficherFormulaire();
            ?>
        </div>
        </div>
      </div>
  </div>
  </main>
</div>
<div>
    <?php
		include_once ('vues/vueBas.php');
	?>
</div>
