<?php

$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);
$Adherent = new AdherentDAO();
echo $_SESSION['idAdherent'];
if(isset($_SESSION['idAdherent'])){
  $tabResul = $Adherent->facture($_SESSION['idAdherent']);
}

require_once 'vues/adherents/vueAdherentsFactures.php' ;
