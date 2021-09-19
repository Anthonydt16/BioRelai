<?php

 $_SESSION['Compte'] = 'visiteur';
 $_SESSION['bioRelai'] ='Visiteurs';
 $_SESSION['unUtilisateur'] = [];

include_once dispatcher::dispatch($_SESSION['bioRelai']);
