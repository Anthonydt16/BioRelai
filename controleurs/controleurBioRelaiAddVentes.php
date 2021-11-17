<?php

$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);

$formulaireNewProd = new Formulaire('post', 'index.php', 'addPNio', 'addPNio');




$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Date de la vente',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputDate('dateVenteBio', 'dateVenteBio','',  1, 'Entrez la date de la vente', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Date de debut de vente pour le producteur',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputDate('dateDebutProdVenteBio', 'dateDebutProdVenteBio','',  1, 'Entrez la date de debut de vente pour le producteur', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Date de la vente',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputDate('dateFinProdVenteBio', 'dateFinProdVenteBio','',  1, 'Entrez la date de la vente', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Date de la vente',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputDate('dateFinCliVenteBio', 'dateFinCliVenteBio','',  1, 'Entrez la date de la vente', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputSubmit('submitConnex', 'submitConnex', 'Valider la modification',"btn btn-light btn-lg btn-block"));
$formulaireNewProd->ajouterComposantTab();
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->creerFormulaire();



require_once 'vues/bioRelai/vueBioRelaiAddVentes.php' ;
