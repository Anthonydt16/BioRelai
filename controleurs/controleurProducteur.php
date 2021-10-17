<?php
$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);

$bioRelai = new Menu("bioRelai");
// a abréger
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Vendre", "ProducteurMesProduitsVendre"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Mes Produits", "ProducteurMesProduits"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Mes Commandes", "ProducteurCommandesEnCours"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Historique", "ProducteurCommandesHisto"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Mon Compte", "ProducteurMonCompte"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Deconnexion", "Deconnexion"));
$menuPrincipalbioRelai = $bioRelai->creerMenu('bioRelai','bioRelai');

$_SESSION['bioRelai'] = 'ProducteurMonCompte';

if(!empty($_SESSION['navBarRequete'])){
  //on initialise le session biorelai
  $_SESSION['bioRelai']  = $_SESSION['navBarRequete'];
  //ensuite on vide le session navBar
  $_SESSION['navBarRequete'] = [];
}




include_once dispatcher::dispatch($_SESSION['bioRelai']);

