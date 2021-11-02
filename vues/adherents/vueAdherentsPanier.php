<?php
include_once ('vues/vueHaut.php');
?>
<div class="conteneur">
  <form action="" method="get" class="form-example">

  <?php

  //Compteur qui permet de savoir l'id du produit en cours de traitement
    $j = 0;
  //debut du tab

      echo'<table class="table">';
      echo '<thead>';
      echo"<tr>";
      for($i = 0; $i<count($EnTete); $i++){
          echo'<th scope="col">';
          echo $EnTete[$i];
          echo"</th>";
      }
      echo"</tr>";
      echo '</thead>';
      echo '<tbody>';
      foreach($adherent->affichagePanier() as $ligne => $value){
        $i = 0;
        $j++;
        echo "<tr>";
              foreach ($value as $cell){
                $i++;
                if($i == 3){

                  echo "<td>";
                  echo '<select name="quantite'.$j.'" id="quantite'.$j.'">';
                  //recup des quantite

                    $quantite = $produits->quantiteProduit($j)['quantite'];
                    $quantite++;
                    echo $quantite++;

                  //mis dans le select des nb quantité
                  for ($k=0; $k <$quantite; $k++) {
                    if(!empty($tabQuantiteChoix)){
                      echo var_dump($tabQuantiteChoix);
                      if($k == 0){
                        echo' <option value="'.$tabQuantiteChoix[$j-1].'">'.$tabQuantiteChoix[$j-1].'</option>';
                      }

                    }
                    echo' <option value="'.$k.'">'.$k.'</option>';
                  }

                  echo '</select>';

                  echo"</td>";
                  //indante le i pour ajouter une colonne
                  $i++;
                }
                if($i < 4){
                    echo "<td>".$cell."</td>";
                }else{
                  if($i == 4){
                    echo '<td><a class="btn btn-danger" href="index.php?suppProduit='.$j.'" role="button">supprimer</a></td>';

                  }

                }
            }
        echo "</tr>";
      }
      echo '</tbody>';
      echo "</table>";
      //fin du tab
  ?>
     <input class="btn btn-success" type="submit" value="valider les quantites">
     <!-- differencie 2 button -->
     <button class="btn btn-success" type="submit" name ="panierValid" value="panier">validation</button>
  </form>
</div>
    <?php
		include_once ('vues/vueBas.php');
	?>
</div>
