<?php
class CategorieDAO{
  public static function recupCode(){
    $requeteprepa = DBConnex::getInstance()->prepare("SELECT idCategorie FROM categories");
    $requeteprepa->execute();
    $requete = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
    return $requete;

  }

  public static function recupNom(){
    $requeteprepa = DBConnex::getInstance()->prepare("SELECT nomCategorie FROM categories");
    $requeteprepa->execute();
    $requete = $requeteprepa->fetchAll(PDO::FETCH_ASSOC);
    return $requete;

  }
}
