<?php
$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);



$messageErreurConnexion = "erreur de connexion !";
$formulaireModifCompte = new Formulaire('post', '', 'ModifCompte', 'ModifCompte');

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Identification :',"label"));
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputTexte('loginM', 'loginM',$UnUtilisateur->getLogin(), 1, 'Modifier votre identifiant', '',"form-control"));
$formulaireModifCompte->ajouterComposantTab();


$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Email :',"label"));
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputTexte('EmailM', 'EmailM', $UnUtilisateur->getMailUser(), 1, 'Modifier votre Email', '',"form-control"));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('Mot de Passe (obligatoire pour la modification même sans modifier le mots de passe) :',"label"));
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputMdp('mdpM', 'mdpM',  1, 'Entrez votre mot de passe', '',"form-control"));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('nom :',"label"));
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputTexte('nomM', 'nomM', $UnUtilisateur->getNomUser(), 1, 'Modifier votre nom', '',"form-control"));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerLabel('prenom :',"label"));
$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte->creerInputTexte('prenomM', 'prenomM', $UnUtilisateur->getPrenomUser(), 1, 'Modifier votre prenom', '',"form-control"));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->ajouterComposantLigne($formulaireModifCompte-> creerInputSubmit('submitModif', 'submitModif', 'Valider',"btn btn-light btn-lg btn-block"));
$formulaireModifCompte->ajouterComposantTab();

//$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerMessage($messageErreurConnexion));
$formulaireModifCompte->ajouterComposantTab();

$formulaireModifCompte->creerFormulaire();


if(isset($_POST['prenomM'])){
  if(isset($_POST['submitModif'])){
    $tabUtilisateur = UtilisateurDAO::UNUtilisateur($_POST['loginM'], $_POST['mdpM']);
    $unAdherentDAO = new adherentDAO();
    $unAdherentDAO->modificationAdherent($UnUtilisateur->getIdUser(),$_POST['EmailM'], $_POST['prenomM'], $_POST['nomM'], $_POST['loginM'], $_POST['mdpM']);
    $tabUtilisateur = $unAdherentDAO->UNUtilisateurID($UnUtilisateur->getIdUser());
    //mise a jours des données *
    $UnUtilisateur->hydrate($tabUtilisateur);
    $_SESSION['unUtilisateur'] = serialize($UnUtilisateur);
  }
  else{
    echo "erreur submit";
  }
}
require_once 'vues/adherents/vueAdherentsMonCompte.php' ;
