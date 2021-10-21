<?php
class affichageProduit{
  public static function affichageAchat($tabAchats){
    foreach ($tabAchats as $key) {
      echo'<div class="card" style="width: 18rem;">';
      echo'<div class="card-body">';
      echo'<h5 class="card-title">'.$key['libelleProduit'].' de la categorie: '.$key['nomCategorie'].'</h5>';
      echo'<p class="card-text">l article : '.$key['libelleProduit'].' la de provenance commune : '.$key['communeProduct'].' la quantité : '.$key['quantite'].' le prix Unité : '.$key['unite'].' le prix au kilo : '.$key['prix'].' </p>';
      $optionquantité = [];

      for($i = 1;$i<$key['quantite']+1;$i++){
        array_Push($optionquantité,$i);
      }

      $formulairechoixQProduit= new Formulaire('get', 'index.php', 'fAchat', 'FAchat');

      $formulairechoixQProduit->ajouterComposantLigne($formulairechoixQProduit->creerLabel('choix quantité :',"label"));
      $formulairechoixQProduit->ajouterComposantLigne($formulairechoixQProduit->creerSelect("selectChoixq", "selectChoixq", "choix quantité", $optionquantité,"" ));
      $formulairechoixQProduit->ajouterComposantTab();

      $formulairechoixQProduit->ajouterComposantLigne($formulairechoixQProduit->creerButonSubmit('submitAchat', 'submitAchat', '<i class="fas fa-shopping-cart"></i>',"btn btn-light btn-lg btn-block"));
      $formulairechoixQProduit->ajouterComposantTab();


      $formulairechoixQProduit->creerFormulaire();
      $formulairechoixQProduit->afficherFormulaire();
      echo'</div>';
      echo'</div>';
    }

  }
}
