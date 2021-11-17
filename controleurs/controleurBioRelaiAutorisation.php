<?php
$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);

$formulaireNewProd = new Formulaire('post', 'index.php', 'checkAuto', 'checkAuto');




$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Autoriser ventes pour tout le monde  : ','label'));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputCheckBox('checkAutorisation', 'checkAutorisation','', true , '', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Autoriser ventes pour tout les producteurs : ','label'));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputCheckBox('checkAutorisation', 'checkAutorisation','', true , '', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputSubmit('submitConnex', 'submitConnex', 'Valider la modification',"btn btn-light btn-lg btn-block"));
$formulaireNewProd->ajouterComposantTab();
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->creerFormulaire();

require_once 'vues/bioRelai/vueBioRelaiAutorisation.php' ;
