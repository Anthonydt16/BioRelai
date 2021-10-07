<?php
include_once ('vues/vueHaut.php');

?>
<div class="conteneur">
  <divc class="card">
    <div class="card-body">
      <h5 class="card-title">Mon Compte</h5>
      <div class="form-group">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Email : <?php echo $UnUtilisateur->getMailUser();?></li>
          <li class="list-group-item">login : <?php   echo $UnUtilisateur->getLogin();?></li>
          <li class="list-group-item">Prenom: <?php  echo $UnUtilisateur->getPrenomUser();?></li>
          <li class="list-group-item">nom: <?php  echo $UnUtilisateur->getNomUser();?></li>
      </ul>
      </div>
    </div>
    <div class="card-body">
      <h5 class="card-title">Modifier mon compte</h5>
      <div class="form-group">
          <?php
            $formulaireModifCompte->afficherFormulaire();
          ?>
      </div>
    </div>
  </div>
</div>
    <?php
		include_once ('vues/vueBas.php');
	?>
</div>
