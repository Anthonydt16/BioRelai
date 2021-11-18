<?php
include_once ('vues/vueHaut.php');

?>
<div class="conteneur">
  <table class="table table table-striped">
    <thead>
      <tr>
        <th scope="col" class="table-success">idCommande</th>
        <th scope="col" class="table-success">produit</th>
        <th scope="col" class="table-success">prix Unité</th>
        <th scope="col" class="table-success">quantité</th>
        <th scope="col" class="table-success">date commande</th>
        <th scope="col" class="table-success">prix total</th>

      </tr>
    </thead>
    <tbody>
  <?php
  if(isset($tabResul)){
    foreach ($tabResul as $key => $value) {
              echo '<tr>';
              echo '<th>'.$value['idCommande'].'</th>';
              echo '<td>'.$value['libelleProduit'].'</td>';
              echo '<td>'.$value['prix'].'</td>';
              echo '<td>'.$value['quantite'].'</td>';
              echo '<td>'.$value['dateCommande'].'</td>';
              echo '<td>'.$value['prix']*$value['quantite'].' Euro</td>';
              echo '</tr>';
  }
  }

  ?>
</tbody>
</table>
</div>
    <?php
		include_once ('vues/vueBas.php');
	?>
</div>
