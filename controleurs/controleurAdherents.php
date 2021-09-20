<?php
$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);

$bioRelai->ajouterComposant($bioRelai->creerItemLien("Presentation", "Visiteurs"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Presentation", "Visiteurs"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Presentation", "Visiteurs"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Presentation", "Visiteurs"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Presentation", "Visiteurs"));
$bioRelai->ajouterComposant($bioRelai->creerItemLien("Deconnexion", "Deconnexion"));
$menuPrincipalbioRelai = $bioRelai->creerMenu('bioRelaiVisiteur','bioRelai');

$_SESSION['bioRelai'] = 'Visiteurs';
include_once dispatcher::dispatch($_SESSION['bioRelai']);
