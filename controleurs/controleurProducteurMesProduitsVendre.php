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

$idV=VenteDAO::recupIdVente($dispo['debut'],$dispo['fin']);// creer fct

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



}
else {//sinon
$e=1;
}

require_once 'vues/producteur/vueProducteurMesProduitsVendre.php';
