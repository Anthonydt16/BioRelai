<?php
$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);

$formulaireNewProd = new Formulaire('post', 'index.php', 'addPNio', 'addPNio');

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('ID du producteur a modifier : ',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('idNprod', 'idNprod', '', 1, 'Entrez le code id', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Nouveau login du producteur : ',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('LoginNProd', 'LoginNProd', '', 1, 'Entrez un nouveau login', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();


$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Mot de passe du producteurs',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('mdpIPProd', 'mdpIPProd','',  1, 'Entrez un nouveau votre mot de passe', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();


$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Adresse du producteur',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('adressProN', 'adressProN','',  1, 'Entrez une nouvelle adresse', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Commune du nouveau producteur',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('CommuneProN', 'CommuneProN','',  1, 'Entrez une commune', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Code postal du producteur',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('codePostalProN', 'codePostalProN','',  1, 'Entrez un nouveau code postal', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerLabel('Présentation du producteur',"label"));
$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputTexte('presentProN', 'presentProN',  1,'', 'Entrez une nouvelle présentation', '',"form-control"));
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantLigne($formulaireNewProd->creerInputSubmit('submitConnex', 'submitConnex', 'Valider la modification',"btn btn-light btn-lg btn-block"));
$formulaireNewProd->ajouterComposantTab();
$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->ajouterComposantTab();

$formulaireNewProd->creerFormulaire();


$formulaireModifProd = new Formulaire('post', 'index.php', 'modifPNio', 'modifPNio');

$formulaireModifProd->ajouterComposantLigne($formulaireModifProd->creerLabel('Modifier Login : '.$UnUtilisateur->getLogin(),"label"));
$formulaireModifProd->ajouterComposantLigne($formulaireModifProd->creerInputTexte('loginIMBio', 'loginIMBio', '', 1, 'Entrez un nouveau login', '',"form-control"));
$formulaireModifProd->ajouterComposantTab();


$formulaireModifProd->ajouterComposantLigne($formulaireModifProd->creerLabel('Modifier Mot de Passe :',"label"));
$formulaireModifProd->ajouterComposantLigne($formulaireModifProd->creerInputMdp('mdpIMBio', 'mdpIMBio',  1, 'Entrez un nouveau votre mot de passe', '',"form-control"));
$formulaireModifProd->ajouterComposantTab();

$formulaireModifProd->ajouterComposantLigne($formulaireModifProd->creerInputSubmit('submitConnex', 'submitConnex', 'Valider la modification',"btn btn-light btn-lg btn-block"));
$formulaireModifProd->ajouterComposantTab();
$formulaireModifProd->ajouterComposantTab();

$formulaireModifProd->ajouterComposantTab();

$formulaireModifProd->creerFormulaire();


$formulaireDeleteProd = new Formulaire('post', 'index.php', 'delPfNio', 'delPfNio');




$formulaireDeleteProd->ajouterComposantLigne($formulaireDeleteProd->creerInputSubmit('submitConnex', 'submitConnex', 'Valider la modification',"btn btn-light btn-lg btn-block"));
$formulaireDeleteProd->ajouterComposantTab();
$formulaireDeleteProd->ajouterComposantTab();

$formulaireDeleteProd->ajouterComposantTab();

$formulaireDeleteProd->creerFormulaire();


require_once 'vues/bioRelai/vueBioRelaiModProducteurs.php' ;
