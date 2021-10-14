<?php
//$UnUtilisateur->getStatut()
$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);
$bioRelai = new Menu("bioRelai");

$bioRelai->ajouterComposant($bioRelai->creerItemLien("Ventes", "BioRelaiVentes"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Autorisation", "BioRelaiAutorisation"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien($UnUtilisateur->getLogin(), "BioRelaiCompte"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Producteurs", "BioRelaiProducteurs"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Factures", "BioRelaiFactures"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Produit", "BioRelaiProduit"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Déconnexion", "Deconnexion"));

$menuPrincipalbioRelai = $bioRelai->creerMenu('bioRelai','bioRelai');

$_SESSION['bioRelai'] = 'Visiteurs';

if(!empty($_SESSION['navBarRequete'])){
  //on initialise le session biorelai
  $_SESSION['bioRelai']  = $_SESSION['navBarRequete'];
  //ensuite on vide le session navBar
  $_SESSION['navBarRequete'] = [];
}

include_once dispatcher::dispatch($_SESSION['bioRelai']);