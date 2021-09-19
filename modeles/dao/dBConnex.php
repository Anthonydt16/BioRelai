<?php
class DBConnex extends PDO{

    private static $instance;

    public static function getInstance(){
        if ( !self::$instance ){
            self::$instance = new DBConnex();
        }
        return self::$instance;
    }

    public function __construct(){
        try {
            parent::__construct(Param::$dsn ,Param::$user, Param::$pass);
        } catch (Exception $e) {
            echo $e->getMessage();
            die("Impossible de se connecter.") ;
        }
    }

    public function connexion($unDsn,$unUser,$unPass){
        try{
            $uneConnex = new PDO($unDsn, $unUser, $unPass);
            return $uneConnex;
        }
        catch(PDOException $e){
            die("erreur de connexion !".$e->getMessage());
        }
    }
    public function login($connex,$login){

        $requete = DBConnex::getInstance()->prepare("SELECT login FROM `utilisateur` WHERE login = :login;");
        $requete->bindParam(":login",$login);
        $requete->execute();
        $donnee = $requete->fetch(PDO::FETCH_ASSOC);
        return $donnee['login'];

    }
    public function password($connex,$mdp){

        $requete = DBConnex::getInstance()->prepare("SELECT mdpUser FROM `utilisateur` WHERE mdpUser = :mdp ;");
        $requete->bindParam(":mdp",$mdp);
        $requete->execute();
        $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
        return $donnee['mdpUser'];
    }


}
