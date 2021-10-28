<?php

require_once 'modele/dao/param.php';
require_once 'modele/dao/dBconnex.php';


function tab($array,$enTete){



    echo'<table class="table">';
    echo '<thead>';
    echo"<tr>";
    for($i = 0; $i<count($enTete); $i++){
        echo'<th scope="col">';
        echo $enTete[$i];
        echo"</th>";
    }
    echo"</tr>";
    echo '</thead>';
    echo '<tbody>';



    foreach($array as $ligne => $value){


      echo "<tr>";

            foreach ($value as $cell) {
              if($cell == $value['bulletinPDF']){
                echo '<td><a class="btn btn-secondary" href="pdf/'.$value['bulletinPDF'].'" role="button">'.$value['bulletinPDF'].'</a></td>';
              }
              else{
              echo "<td>".$cell."</td>";
            }
          }



      echo "</tr>";


    }
    echo '</tbody>';
    echo "</table>";
}

function menuDeroulant($tab){

$j = 0;


$EnTete = array("produit", "prix unité", "quantité", "lien PDF", "idContrat","Modification");

  foreach($tab as $ligne){
    $j++;
    $tabNomContrat= $leContrat->nomContrat($ligne['idContrat']);
    foreach ($tabNomContrat as $key){
      $nom = $key['nom'];
      $prenom = $key['prenom'];
    }
    // permet d'ajouter le bouton au tab tabbulletin
    $tabBulletin= $leBulletin->bulletin($ligne['idContrat']);
    for($i =0; $i<count($tabBulletin); $i++){
      $compteur = $compteur+1;

      array_Push($tabBulletin[$i], '<a class="btn btn-secondary" href="index.php?m2lMPModifieB='.$compteur.'" role="button">Modifier le bulletin</a>');
    }
    echo'<div class="accordion" id="accordionExample">';
  	  echo'<div class="accordion-item">';
  	   echo '<h2 class="accordion-header" id="'.$ligne['idContrat'].'">';
  	     echo '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$ligne['idContrat'].'" aria-expanded="true" aria-controls="collapseOne">
  	        n° de contrat '.$ligne['idContrat'].' | nom :'.$nom.' prenom : '.$prenom.'
  	      </button>';
  	  echo  '</h2>';
  	    echo'<div id="collapse'.$ligne['idContrat'].'" class="accordion-collapse collapse show" aria-labelledby="'.$ligne['idContrat'].'" data-bs-parent="#accordionExample">';
  	    echo  '<div class="accordion-body">';
        echo '<a class="btn btn-secondary" href="index.php?m2lMPModifieC='.$j.'" role="button">Modifier le contrat</a>';


  	         echo tab($tabBulletin,$EnTete);

  	     echo '</div>';
  	   echo '</div>';
  	 echo '</div>';

  	echo '</div>';
  }

}
