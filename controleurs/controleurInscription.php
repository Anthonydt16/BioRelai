<?php
if($_SESSION['Compte'] == 'visiteur'){
$messageErreurConnexion = "erreur de connexion !";
$formulaireInscription = new Formulaire('post', 'index.php', 'Insciption', 'Insciption');
 
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Nom :',"label"));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('nom', 'nom', '', 1, 'Entrez votre nom', '',"form-control"));
$formulaireInscription->ajouterComposantTab();

 
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Prénom :',"label"));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('prenom', 'prenom', '', 1, 'Entrez votre prénom', '',"form-control"));
$formulaireInscription->ajouterComposantTab();

 
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Login :',"label"));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('login', 'login', '', 1, 'Entrez votre login', '',"form-control"));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('email :',"label"));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('email', 'email', '', 1, 'Entrez votre email', '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$',"form-control"));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('vérifier votre email :',"label"));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('vEmail', 'vEmail', '', 1, 'Entrez votre email à nouveau', '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$',"form-control"));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Mot de Passe :',"label"));
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputMdp('mdp', 'mdp',  1, 'Entrez votre mot de passe', '',"form-control"));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputSubmit('submitConnex', 'submitConnex', 'Valider',"btn btn-light btn-lg btn-block"));
$formulaireInscription->ajouterComposantTab();

//$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerMessage($messageErreurConnexion));
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->creerFormulaire();

require_once 'vues/visiteurs/vueInscription.php' ;

}
else{
//$_SESSION['identification']=[];
$_SESSION['bioRelai']="visiteurs";
header('location: index.php');
}

?>