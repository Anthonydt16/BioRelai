<?php

$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);
$Adherent = new AdherentDAO();
$tabResul = $Adherent->facture($UnUtilisateur->getIdUser());
require_once 'vues/adherents/vueAdherentsFactures.php' ;
