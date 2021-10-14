<?php
class affichageProduit{
  public static function affichageAchat($tabAchats){
    foreach ($tabAchats as $key) {
      echo'<div class="card" style="width: 18rem;">';
      echo'<div class="card-body">';
      echo'<h5 class="card-title">'.$key['libelleProduit'].'</h5>';
      echo'<p class="card-text">l article : '.$key['libelleProduit'].' la de provenance commune : '.$key['communeProduct'].' la quantité : '.$key['quantite'].' le prix Unité : '.$key['unite'].' le prix au kilo : '.$key['prix'].' </p>';
      echo'<a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></a>';
      echo'</div>';
      echo'</div>';
    }

  }
}
