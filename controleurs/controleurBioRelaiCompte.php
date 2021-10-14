<?php
$formulaireModifBio = new Formulaire('post', 'index.php', 'modifNio', 'modifNio');

$formulaireModifBio->ajouterComposantLigne($formulaireModifBio->creerLabel('Modifier Login :',"label"));
$formulaireModifBio->ajouterComposantLigne($formulaireModifBio->creerInputTexte('loginIMBio', 'loginIMBio', '', 1, 'Entrez un nouveau login', '',"form-control"));
$formulaireModifBio->ajouterComposantTab();


$formulaireModifBio->ajouterComposantLigne($formulaireModifBio->creerLabel('Modifier Mot de Passe :',"label"));
$formulaireModifBio->ajouterComposantLigne($formulaireModifBio->creerInputMdp('mdpIMBio', 'mdpIMBio',  1, 'Entrez un nouveau votre mot de passe', '',"form-control"));
$formulaireModifBio->ajouterComposantTab();

$formulaireModifBio->ajouterComposantLigne($formulaireModifBio->creerInputSubmit('submitConnex', 'submitConnex', 'Valider la modification',"btn btn-light btn-lg btn-block"));
$formulaireModifBio->ajouterComposantTab();
$formulaireModifBio->ajouterComposantTab();

$formulaireModifBio->ajouterComposantTab();

$formulaireModifBio->creerFormulaire();

require_once 'vues/bioRelai/vueBioRelaiCompte.php' ;






