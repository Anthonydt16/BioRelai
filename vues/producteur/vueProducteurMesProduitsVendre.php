<?php
include_once ('vues/vueHaut.php');

?>
<div class="conteneur">
  <?php
  if($e==1){//si il n'y a pas de ventes
      affichageProduit::afficherPasDeVente();
  }
  if($e==2){
    affichageProduit::afficherProduitsProposer(VenteDAO::recupProduitsProposer($idV));
  
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
  <main>
  <div id="texteBienvenue" class="card" style="width: 80%;">
      <div class='titre'><h5>Supprimer une proposition de vente d'un produit</h5></div>
        <div class="card-body">
        <div class="form-group">
            <?php
              $formulaireSupprimerProposer->afficherFormulaire();
            ?>
        </div>
        </div>
      </div>
  </div>
  </main>
  <main>
  <div id="texteBienvenue" class="card" style="width: 80%;">
      <div class='titre'><h5>Modifier une proposition de vente d'un produit</h5></div>
        <div class="card-body">
        <div class="form-group">
            <?php
              $formulaireModifierProposer->afficherFormulaire();
            ?>
        </div>
        </div>
      </div>
  </div>
  </main>
<?php }?>
</div>
<div>
    <?php
		include_once ('vues/vueBas.php');
	?>
</div>
