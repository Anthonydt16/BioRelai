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

$formulaireNewProd = new Formulaire('post', 'index.php', 'addPNio', 'addPNio');



$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('ID de la vente a modifier : ','label'));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerSelectID('modVente','modVente',$tabVC ,$tabVC));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Date de la vente',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputDate('moddateVenteBio', 'moddateVenteBio','',  1, 'Entrez la date de la vente', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Date de debut de vente pour le producteur',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputDate('moddateDebutProdVenteBio', 'moddateDebutProdVenteBio','',  1, 'Entrez la date de debut de vente pour le producteur', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Date de la vente',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputDate('moddateFinProdVenteBio', 'moddateFinProdVenteBio','',  1, 'Entrez la date de la vente', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Date de la vente',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputDate('moddateFinCliVenteBio', 'moddateFinCliVenteBio','',  1, 'Entrez la date de la vente', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputSubmit('submitConnex', 'submitConnex', 'Valider la modification',"btn btn-light btn-lg btn-block"));
$formulaireNewProd->ajouterComposantTab();
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->creerFormulaire();



require_once 'vues/bioRelai/vueBioRelaiModVentes.php' ;
