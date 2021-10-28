<?php


$tabC=CategorieDAO::recupCode();
$tabN=CategorieDAO::recupNom();

for($i=0;$i<count($tabC);$i++) {
  $tabVC[$i]=$tabC[$i]['idCategorie'];
}
for($i=0;$i<count($tabN);$i++) {
  $tabVN[$i]=$tabN[$i]['nomCategorie'];
}

$tabS=ProducteurDAO::recupIdNom();
for($i=0;$i<count($tabS);$i++) {
  $tabidS[$i]=$tabS[$i]['codeProduit'];
  $tablibS[$i]=$tabS[$i]['libelleProduit'];
}




$formulaireAjouterProduit= new Formulaire('post', '?bioRelai=producteurMesProduits','addP','addP');



$formulaireAjouterProduit->ajouterComposantLigne($formulaireAjouterProduit->creerLabel('Libelle du produit : ','label'));
$formulaireAjouterProduit->ajouterComposantLigne($formulaireAjouterProduit->creerInputTexte('alibP', 'alibP', '', 0, 'Libelle', '',"form-control"));
$formulaireAjouterProduit->ajouterComposantTab();

$formulaireAjouterProduit->ajouterComposantLigne($formulaireAjouterProduit->creerLabel('Descriptif du produit : ','label'));
$formulaireAjouterProduit->ajouterComposantLigne($formulaireAjouterProduit->creerInputDescription('adesP', 'adesP', '', 0, 'Descriptif', '',"form-control",4));
$formulaireAjouterProduit->ajouterComposantTab();


$formulaireAjouterProduit->ajouterComposantLigne($formulaireAjouterProduit->creerLabel('Categorie : ','label'));
$formulaireAjouterProduit->ajouterComposantLigne($formulaireAjouterProduit->creerSelectID('acatP','acatP',$tabVN,$tabVC));
$formulaireAjouterProduit->ajouterComposantTab();


$formulaireAjouterProduit->ajouterComposantLigne($formulaireAjouterProduit-> creerInputSubmit('ajtP', 'ajtP', 'Ajouter',"btn btn-light btn-lg btn-block"));
$formulaireAjouterProduit->ajouterComposantTab();




$formulaireAjouterProduit->creerFormulaire();

$formulaireSupprimerProduit= new Formulaire('post', '?bioRelai=producteurMesProduits','suppP','suppP');


$formulaireSupprimerProduit->ajouterComposantLigne($formulaireSupprimerProduit->creerLabel('Produit a supprimer : ','label'));
$formulaireSupprimerProduit->ajouterComposantLigne($formulaireSupprimerProduit->creerSelectID('psupp','psupp',$tablibS,$tabidS));
$formulaireSupprimerProduit->ajouterComposantTab();


$formulaireSupprimerProduit->ajouterComposantLigne($formulaireSupprimerProduit-> creerInputSubmit('suppP', 'suppP', 'Supprimer',"btn btn-light btn-lg btn-block"));
$formulaireSupprimerProduit->ajouterComposantTab();

$formulaireSupprimerProduit->creerFormulaire();

$formulaireModifierProduit= new Formulaire('post', '?bioRelai=producteurModifProduit','mP','mP');


$formulaireModifierProduit->ajouterComposantLigne($formulaireModifierProduit->creerLabel('Produit a modifier : ','label'));
$formulaireModifierProduit->ajouterComposantLigne($formulaireModifierProduit->creerSelectID('modP','modP',$tablibS,$tabidS));
$formulaireModifierProduit->ajouterComposantTab();

$formulaireModifierProduit->ajouterComposantLigne($formulaireModifierProduit-> creerInputSubmit('mP', 'mP', 'Modifier',"btn btn-light btn-lg btn-block"));
$formulaireModifierProduit->ajouterComposantTab();

$formulaireModifierProduit->creerFormulaire();


require_once 'vues/producteur/vueProducteurMesProduits.php';
