<?php
if($_SESSION['Compte'] == 'visiteur'){
$messageErreurConnexion = "erreur de connexion !";
$formulaireConnexion = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');
 
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel('Identification :',"label"));
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('login', 'login', '', 1, 'Entrez votre identifiant', '',"form-control"));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel('Mot de Passe :',"label"));
$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMdp('mdp', 'mdp',  1, 'Entrez votre mot de passe', '',"form-control"));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion-> creerInputSubmit('submitConnex', 'submitConnex', 'Valider',"btn btn-light btn-lg btn-block"));
$formulaireConnexion->ajouterComposantTab();

//$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerMessage($messageErreurConnexion));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->creerFormulaire();

require_once 'vues/visiteurs/vueConnexion.php' ;

}
else{
//$_SESSION['identification']=[];
$_SESSION['bioRelai']="visiteurs";
header('location: index.php');
}