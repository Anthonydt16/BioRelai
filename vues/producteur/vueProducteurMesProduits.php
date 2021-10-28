<?php
include_once ('vues/vueHaut.php');

?>
<div class="conteneur">
  <?php
    affichageProduit::afficherProduits(ProducteurDAO::recupProduits());
  ?>
  <main>
  <div id="texteBienvenue" class="card" style="width: 80%;">
      <div class='titre'><h5>Ajouter un Produit</h5></div>
        <div class="card-body">
        <div class="form-group">
            <?php
              $formulaireAjouterProduit->afficherFormulaire();
            ?>
        </div>
        </div>
      </div>
  </div>
  </main>
  <main>
  <div id="texteBienvenue" class="card" style="width: 80%;">
      <div class='titre'><h5>Supprimer un Produit</h5></div>
        <div class="card-body">
        <div class="form-group">
            <?php
              $formulaireSupprimerProduit->afficherFormulaire();
            ?>
        </div>
        </div>
      </div>
  </div>
  </main>
  <main>
  <div id="texteBienvenue" class="card" style="width: 80%;">
      <div class='titre'><h5>Modifier un Produit</h5></div>
        <div class="card-body">
        <div class="form-group">
            <?php
              $formulaireModifierProduit->afficherFormulaire();
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
