<?php
include_once ('vues/vueHaut.php');

?>
<div class="conteneur">
  <main>
  <div id="texteBienvenue" class="card" style="width: 80%;">
      <div class='titre'><h5>Modifier une proposition de vente</h5></div>
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
</div>
    <?php
		include_once ('vues/vueBas.php');
	?>
</div>
