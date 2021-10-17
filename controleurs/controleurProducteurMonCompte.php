<?php

// echo var_dump(unserialize($_SESSION['unUtilisateur']));
 echo var_dump($_SESSION['authentification']);



$formulaireModifierCompte= new Formulaire('post', '?bioRelai=producteurMonCompte','modifC','modifC');



$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerLabel('Nouveau mot de passe : ','label'));
$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerInputTexte('mdp', 'mdp', '', 0, 'Entrez votre nouveau mot de passe', '',"form-control"));
$formulaireModifierCompte->ajouterComposantTab();

$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerLabel('Confirmer le mot de passe : ','label'));
$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerInputTexte('Cmdp', 'Cmdp', '', 0, 'Confirmer votre nouveau mot de passe', '',"form-control"));
$formulaireModifierCompte->ajouterComposantTab();


$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerLabel('Nouvelle adresse : ','label'));
$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerInputTexte('nAdr', 'nAdr', '', 0, 'Entrez votre nouvelle adresse', '',"form-control"));
$formulaireModifierCompte->ajouterComposantTab();


$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerLabel('Nouvelle commune : ','label'));
$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerInputTexte('nComm', 'nComm', '', 0, 'Entrez votre nouvelle commune', '',"form-control"));
$formulaireModifierCompte->ajouterComposantTab();


$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerLabel('Nouveau Code Postal : ','label'));
$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerInputTexte('nCodeP', 'nCodeP', '', 0, 'Entrez votre nouveau code postal', '',"form-control"));
$formulaireModifierCompte->ajouterComposantTab();

$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerLabel('Nouvelle présentation : ','label'));
$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte->creerInputTexte('nPres', 'nPres', '', 0, 'Entrez votre nouvelle présentation', '',"form-control"));
$formulaireModifierCompte->ajouterComposantTab();

$formulaireModifierCompte->ajouterComposantLigne($formulaireModifierCompte-> creerInputSubmit('submitPres', 'submitPres', 'Valider',"btn btn-light btn-lg btn-block"));
$formulaireModifierCompte->ajouterComposantTab();




$formulaireModifierCompte->creerFormulaire();


require_once 'vues/producteur/vueProducteurMonCompte.php';