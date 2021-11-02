<?php
class affichageProduit{
  public static function affichageAchat($tabAchats){
    foreach ($tabAchats as $key) {
      echo'<div class="card" style="width: 18rem;">';
      echo'<div class="card-body">';
      echo'<h5 class="card-title">'.$key['libelleProduit'].' de la categorie: '.$key['nomCategorie'].'</h5>';
      echo'<p class="card-text">l article : '.$key['libelleProduit'].' la de provenance commune : '.$key['communeProduct'].' la quantité : '.$key['quantite'].' lUnité est : '.$key['unite'].' le prix au kilo : '.$key['prix'].' </p>';
      echo '<button type="submit" class="btn" onclick=window.location.href="index.php?idProduit='.$key['codeProduit'].'"><span class="fas fa-shopping-cart"></span></button></p>';
      echo'</div>';
      echo'</div>';
    }

  }

  public static function afficherProduits($tabProduits){
    foreach ($tabProduits as $key) {
      echo'<div class="card" style="width: 18rem;">';
      echo'<div class="card-body">';
      echo'<h5 class="card-title">'.$key['libelleProduit'].' de la categorie: '.$key['nomCategorie'].'</h5>';
      echo'<p class="card-text">Description : '.$key['descriptifProduit'].' </p>';
      echo'</div>';
      echo'</div>';
  }
}

public static function afficherPasDeVente(){
    echo'<div class="card" style="width: 18rem;">';
    echo'<div class="card-body">';
    echo'<h5 class="card-title">Pas de Vente Disponible pour le moment</h5>';
    echo'<p class="card-text">Reessayer plus tard </p>';
    echo'</div>';
    echo'</div>';
}

public static function afficherProduitsProposer($tabProduits){
  foreach ($tabProduits as $key) {
    echo'<div class="card" style="width: 18rem;">';
    echo'<div class="card-body">';
    echo'<h5 class="card-title">'.$key['quantite'].' '.$key['libelleProduit'].'(s)'.'</h5>';
    echo'<p class="card-text">Vendu(e)(s) : '.$key['prix'].' €/ '.$key['unite'].'</p>';
    echo'</div>';
    echo'</div>';
}
}

public static function afficherCommandesEnCours($tabCommandes){
  foreach ($tabCommandes as $key) {
    echo'<div class="card" style="width: 18rem;">';
    echo'<div class="card-body">';
    echo'<h5 class="card-title">'.$key['prenomUser'].' '.$key['nomUser'].' a commandé'.'</h5>';
    echo'<p class="card-text">'.$key['quantite'].' '.$key['libelleProduit'].'</p>';
    echo'</div>';
    echo'</div>';
}
}



}
