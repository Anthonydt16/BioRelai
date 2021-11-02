<?php


$e=null;
//pour qu'il y ai une vente de disponible, il faut que la date actuelle soit comprise entre la date de
//début du producteur et sa date de fin
//tableau asso contenant si il y a une vente dispo pour le producteur et sa date de debut et de fin si il y a vente
$dispo=ProducteurDAO::venteDispo();
//Si une vente est disponible
if($dispo['bool']==True){

$idV=VenteDAO::recupIdVente($dispo['debut'],$dispo['fin']);
$e=2;
}
else {//sinon
$e=1;
}


require_once 'vues/producteur/vueProducteurCommandesEnCours.php';
