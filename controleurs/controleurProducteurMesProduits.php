<?php
// $tabC=array();
// $tabN=array();

$tabC=CategorieDAO::recupCode();
$tabN=CategorieDAO::recupNom();

for($i=0;$i<count($tabC);$i++) {
  $tabVC[$i]=$tabC[$i]['idCategorie'];
}
for($i=0;$i<count($tabN);$i++) {
  $tabVN[$i]=$tabN[$i]['nomCategorie'];
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

require_once 'vues/producteur/vueProducteurMesProduits.php';
