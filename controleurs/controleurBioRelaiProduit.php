<?php

$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);

$formulaireNewProd = new Formulaire('post', 'index.php', 'newproduit', 'newproduit');


$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Nouvelle catégorie de produit : ',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('NouveauProduit', 'NouveauProduit', '', 1, 'Entrez le nom de la nouvelle catégorie de produit', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputSubmit('submitConnex', 'submitConnex', 'Valider la modification',"btn btn-light btn-lg btn-block"));
$formulaireNewProd->ajouterComposantTab();
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->creerFormulaire();

require_once 'vues/bioRelai/vueBioRelaiProduit.php' ;
