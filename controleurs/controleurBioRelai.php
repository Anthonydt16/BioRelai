<?php
//$UnUtilisateur->getStatut()
$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);
$bioRelai = new Menu("bioRelai");

$bioRelai->ajouterComposant($bioRelai->creerItemLien("Modifier Ventes", "BioRelaiModVentes"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Supprimer Ventes", "BioRelaiDelVentes"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Ajouter Ventes", "BioRelaiAddVentes"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Autorisation", "BioRelaiAutorisation"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien($UnUtilisateur->getLogin()." (BioRelai)", "BioRelaiCompte"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Ajouter Producteurs", "BioRelaiAddProducteurs"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Modif Producteurs", "BioRelaiModProducteurs"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Supprimer Producteurs", "BioRelaiDelProducteurs"));
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
