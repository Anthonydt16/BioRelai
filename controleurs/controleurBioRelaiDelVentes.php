<?php


$tabC=BioRelaiDAO::recupCodeVente();
$tabN=BioRelaiDAO::recupDateVente();

for($i=0;$i<count($tabC);$i++) {
  $tabVC[$i]=$tabC[$i]['idVente'];
}
for($i=0;$i<count($tabN);$i++) {
  $tabVN[$i]=$tabN[$i]['dateVente'];
}


$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);

$formulaireNewProd = new Formulaire('post', 'index.php', 'delVente', 'delVente');




$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Date de la vente a supprimer : ','label'));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerSelectID('delVente','delVente',$tabVN,$tabVC));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputSubmit('submitConnex', 'submitConnex', 'Valider la modification',"btn btn-light btn-lg btn-block"));
$formulaireNewProd->ajouterComposantTab();
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->creerFormulaire();



require_once 'vues/bioRelai/vueBioRelaiDelVentes.php' ;
