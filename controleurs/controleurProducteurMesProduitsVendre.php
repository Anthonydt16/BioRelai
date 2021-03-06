<?php

//créer 2 tableaux contenant les id et nom des produits
$tabS=ProducteurDAO::recupIdNom();
for($i=0;$i<count($tabS);$i++) {
  $tabidS[$i]=$tabS[$i]['codeProduit'];
  $tablibS[$i]=$tabS[$i]['libelleProduit'];
}

$e=null;
//pour qu'il y ai une vente de disponible, il faut que la date actuelle soit comprise entre la date de
//début du producteur et sa date de fin
//tableau asso contenant si il y a une vente dispo pour le producteur et sa date de debut et de fin si il y a vente
$dispo=ProducteurDAO::venteDispo();
//Si une vente est disponible
if($dispo['bool']==True){

$idV=VenteDAO::recupIdVente($dispo['debut'],$dispo['fin']);

$formulaireProposerProduit= new Formulaire('post', '?bioRelai=producteurMesProduitsVendre','pP','pP');

$formulaireProposerProduit->ajouterComposantLigne($formulaireProposerProduit->creerLabel('Produit a proposer : ','label'));
$formulaireProposerProduit->ajouterComposantLigne($formulaireProposerProduit->creerSelectID('prodP','prodP',$tablibS,$tabidS));
$formulaireProposerProduit->ajouterComposantTab();

$formulaireProposerProduit->ajouterComposantLigne($formulaireProposerProduit->creerLabel('Quantité : ','label'));
$formulaireProposerProduit->ajouterComposantLigne($formulaireProposerProduit->creerInputNombre('quantiteP', 'quantiteP', '1000', 0, '', '',"form-control"));
$formulaireProposerProduit->ajouterComposantTab();

$formulaireProposerProduit->ajouterComposantLigne($formulaireProposerProduit->creerLabel('Prix : ','label'));
$formulaireProposerProduit->ajouterComposantLigne($formulaireProposerProduit->creerInputTexte('prixP', 'prixP', '', 0, 'prix', '',"form-control"));
$formulaireProposerProduit->ajouterComposantTab();

$formulaireProposerProduit->ajouterComposantLigne($formulaireProposerProduit->creerLabel('Unité : ','label'));
$formulaireProposerProduit->ajouterComposantLigne($formulaireProposerProduit->creerInputTexte('uniteP', 'uniteP', '', 0, 'unité', '',"form-control"));
$formulaireProposerProduit->ajouterComposantTab();

$formulaireProposerProduit->ajouterComposantLigne($formulaireProposerProduit-> creerInputHidden('idV','idV',$idV));
$formulaireProposerProduit->ajouterComposantTab();

$formulaireProposerProduit->ajouterComposantLigne($formulaireProposerProduit-> creerInputSubmit('prP', 'prP', 'Proposer',"btn btn-light btn-lg btn-block"));
$formulaireProposerProduit->ajouterComposantTab();

$formulaireProposerProduit->creerFormulaire();

$t=VenteDAO::recupIdNomProdProposer($idV);


$formulaireSupprimerProposer= new Formulaire('post', '?bioRelai=producteurMesProduitsVendre','ssP','ssP');

$formulaireSupprimerProposer->ajouterComposantLigne($formulaireSupprimerProposer->creerLabel('Produit à supprimer : ','label'));
$formulaireSupprimerProposer->ajouterComposantLigne($formulaireSupprimerProposer->creerSelectID('SprodP','SprodP',$t[1],$t[0]));
$formulaireSupprimerProposer->ajouterComposantTab();

$formulaireSupprimerProposer->ajouterComposantLigne($formulaireSupprimerProposer-> creerInputHidden('idV','idV',$idV));
$formulaireSupprimerProposer->ajouterComposantTab();

$formulaireSupprimerProposer->ajouterComposantLigne($formulaireSupprimerProposer-> creerInputSubmit('sP', 'sP', 'Supprimer',"btn btn-light btn-lg btn-block"));
$formulaireSupprimerProposer->ajouterComposantTab();

$formulaireSupprimerProposer->creerFormulaire();



$formulaireModifierProposer= new Formulaire('post', '?bioRelai=producteurModifProposer','ssP','ssP');

$formulaireModifierProposer->ajouterComposantLigne($formulaireModifierProposer->creerLabel('Produit à modifier : ','label'));
$formulaireModifierProposer->ajouterComposantLigne($formulaireModifierProposer->creerSelectID('MprodP','SprodP',$t[1],$t[0]));
$formulaireModifierProposer->ajouterComposantTab();

$formulaireModifierProposer->ajouterComposantLigne($formulaireModifierProposer-> creerInputHidden('idV','idV',$idV));
$formulaireModifierProposer->ajouterComposantTab();

$formulaireModifierProposer->ajouterComposantLigne($formulaireModifierProposer-> creerInputSubmit('sP', 'sP', 'Modifier',"btn btn-light btn-lg btn-block"));
$formulaireModifierProposer->ajouterComposantTab();

$formulaireModifierProposer->creerFormulaire();


$e=2;
}
else {//sinon
$e=1;
}

require_once 'vues/producteur/vueProducteurMesProduitsVendre.php';
