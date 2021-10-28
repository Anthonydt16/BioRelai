<?php
$idP=$_POST['modP'];

$tabC=CategorieDAO::recupCode();
$tabN=CategorieDAO::recupNom();

for($i=0;$i<count($tabC);$i++) {
  $tabVC[$i]=$tabC[$i]['idCategorie'];
}
for($i=0;$i<count($tabN);$i++) {
  $tabVN[$i]=$tabN[$i]['nomCategorie'];
}

$formulaireModifierProduit= new Formulaire('post', '?bioRelai=producteurMesProduits','modifP','modifP');



$formulaireModifierProduit->ajouterComposantLigne($formulaireModifierProduit->creerLabel('Nouveau Libelle du produit : ','label'));
$formulaireModifierProduit->ajouterComposantLigne($formulaireModifierProduit->creerInputTexte('mlibP', 'mlibP', '', 0, 'Libelle', '',"form-control"));
$formulaireModifierProduit->ajouterComposantTab();

$formulaireModifierProduit->ajouterComposantLigne($formulaireModifierProduit->creerLabel('Nouveau Descriptif du produit : ','label'));
$formulaireModifierProduit->ajouterComposantLigne($formulaireModifierProduit->creerInputDescription('mdesP', 'mdesP', '', 0, 'Descriptif', '',"form-control",4));
$formulaireModifierProduit->ajouterComposantTab();


$formulaireModifierProduit->ajouterComposantLigne($formulaireModifierProduit->creerLabel('Categorie : ','label'));
$formulaireModifierProduit->ajouterComposantLigne($formulaireModifierProduit->creerSelectID('mcatP','mcatP',$tabVN,$tabVC));
$formulaireModifierProduit->ajouterComposantTab();


$formulaireModifierProduit->ajouterComposantLigne($formulaireModifierProduit-> creerInputHidden('idP','idP',$idP));
$formulaireModifierProduit->ajouterComposantTab();

$formulaireModifierProduit->ajouterComposantLigne($formulaireModifierProduit-> creerInputSubmit('mP', 'mP', 'Modifier',"btn btn-light btn-lg btn-block"));
$formulaireModifierProduit->ajouterComposantTab();



$formulaireModifierProduit->creerFormulaire();

require_once 'vues/producteur/vueProducteurModifProduit.php';
