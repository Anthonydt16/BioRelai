<?php 
$_SESSION['Compte'] = 'visiteur';
if(isset($_GET['bioRelai'])){
	$_SESSION['bioRelai']= $_GET['bioRelai'];
}
else
{
	if(!isset($_SESSION['bioRelai'])){
		$_SESSION['bioRelai']="visiteurs";
	}
}

$bioRelai = new Menu("bioRelai");

if($_SESSION['Compte'] == 'visiteur'){

    $bioRelai->ajouterComposant($bioRelai->creerItemLien("Presentation", "Visiteurs"));
    $bioRelai->ajouterComposant($bioRelai->creerItemLien("connexion", "Connexion"));
    $bioRelai->ajouterComposant($bioRelai->creerItemLien("inscription", "Inscription"));
}



    $menuPrincipalbioRelai = $bioRelai->creerMenu('bioRelaiVisiteur','bioRelai');

    include_once dispatcher::dispatch($_SESSION['bioRelai']);

