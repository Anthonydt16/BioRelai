<?php
class affichageProduit{
  public function affichageAchat($tabAchats){
    foreach ($tabAchats as $key) {
      echo'<div class="card" style="width: 18rem;">';
      echo'<div class="card-body">';
      echo'<h5 class="card-title">'.$key['libelleProduit'].'</h5>';
      echo'<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card content.</p>';
      echo'<a href="#" class="btn btn-primary">Go somewhere</a>';
      echo'</div>';
      echo'</div>';
    }

  }
}
