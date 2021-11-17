<?php

$tabC=BioRelaiDAO::recupCodeProd();
$tabN=BioRelaiDAO::recupNomProd();

for($i=0;$i<count($tabC);$i++) {
  $tabVC[$i]=$tabC[$i]['idUser'];
}
for($i=0;$i<count($tabN);$i++) {
  $tabVN[$i]=$tabN[$i]['login'];
}

$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);

$formulaireNewProd = new Formulaire('post', 'index.php', 'delP', 'delP');


$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Login du producteur a supprimer : ','label'));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerSelectID('delProd','delProd',$tabVN,$tabVC));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputSubmit('submitConnex', 'submitConnex', 'Valider la modification',"btn btn-light btn-lg btn-block"));
$formulaireNewProd->ajouterComposantTab();
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->creerFormulaire();



require_once 'vues/bioRelai/vueBioRelaiDelProducteurs.php' ;
