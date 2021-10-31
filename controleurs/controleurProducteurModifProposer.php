<?php
$idP=$_POST['MprodP'];
$idV=$_POST['idV'];

$formulaireModifierProposer= new Formulaire('post', '?bioRelai=producteurMesProduitsVendre','mP','mP');

$formulaireModifierProposer->ajouterComposantLigne($formulaireModifierProposer->creerLabel('Quantité : ','label'));
$formulaireModifierProposer->ajouterComposantLigne($formulaireModifierProposer->creerInputNombre('mquantiteP', 'quantiteP', '1000', 0, '', '',"form-control"));
$formulaireModifierProposer->ajouterComposantTab();

$formulaireModifierProposer->ajouterComposantLigne($formulaireModifierProposer->creerLabel('Prix : ','label'));
$formulaireModifierProposer->ajouterComposantLigne($formulaireModifierProposer->creerInputTexte('mprixP', 'prixP', '', 0, 'prix', '',"form-control"));
$formulaireModifierProposer->ajouterComposantTab();

$formulaireModifierProposer->ajouterComposantLigne($formulaireModifierProposer->creerLabel('Unité : ','label'));
$formulaireModifierProposer->ajouterComposantLigne($formulaireModifierProposer->creerInputTexte('muniteP', 'uniteP', '', 0, 'unité', '',"form-control"));
$formulaireModifierProposer->ajouterComposantTab();

$formulaireModifierProposer->ajouterComposantLigne($formulaireModifierProposer-> creerInputHidden('idV','idV',$idV));
$formulaireModifierProposer->ajouterComposantTab();

$formulaireModifierProposer->ajouterComposantLigne($formulaireModifierProposer-> creerInputHidden('idP','idP',$idP));
$formulaireModifierProposer->ajouterComposantTab();

$formulaireModifierProposer->ajouterComposantLigne($formulaireModifierProposer-> creerInputSubmit('mP', 'mP', 'Modifier',"btn btn-light btn-lg btn-block"));
$formulaireModifierProposer->ajouterComposantTab();

$formulaireModifierProposer->creerFormulaire();

require_once 'vues/producteur/vueProducteurModifProposer.php';








 ?>
