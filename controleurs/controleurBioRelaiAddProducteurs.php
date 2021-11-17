<?php
$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);

$formulaireNewProd = new Formulaire('post', 'index.php', 'addPNio', 'addPNio');



$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Nouveau login du producteur : ',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('LoginAddProd', 'LoginAddProd', '', 1, 'Entrez un nouveau login', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Email du producteurs',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('mailIAddProd', 'mailIAddProd','',  1, 'Entrez mail pour producteur', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Prenom du producteurs',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('prenomAddProd', 'prenomAddProd','',  1, 'Entrez prenom pour producteur', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Nom du producteurs',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('nomAddProd', 'nomAddProd','',  1, 'Entrez nom pour producteur', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Mot de passe du producteurs',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('mdpIAddProd', 'mdpIAddProd','',  1, 'Entrez un nouveau votre mot de passe', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();


$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Adresse du producteur',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('adressAddProN', 'adressAddProN','',  1, 'Entrez une nouvelle adresse', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Commune du nouveau producteur',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('CommuneAddProN', 'CommuneAddProN','',  1, 'Entrez une commune', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Code postal du producteur',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('codePostalAddProN', 'codePostalAddProN','',  1, 'Entrez un nouveau code postal', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Présentation du producteur',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('presentAddProN', 'presentAddProN', '', 1, 'Entrez une nouvelle présentation', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputSubmit('submitConnex', 'submitConnex', 'Valider la modification',"btn btn-light btn-lg btn-block"));
$formulaireNewProd->ajouterComposantTab();
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->creerFormulaire();





require_once 'vues/bioRelai/vueBioRelaiAddProducteurs.php' ;
