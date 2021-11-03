<?php
$e=null;



$termine=ProducteurDAO::venteTermine();
//Si une vente est terminée
if($termine==True){

$e=2;
}
else {//sinon
$e=1;
}
require_once 'vues/producteur/vueProducteurCommandesHisto.php';
