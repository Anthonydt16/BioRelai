<?php
require_once 'modeles/dao/param.php';
require_once 'modeles/dao/dBconnex.php';
require_once 'modeles/dao/UtilisateurDAO.php';
require_once 'modeles/dto/Utilisateur.php';
require_once 'modeles/traits/hydrate.php';
$uneConnex = new DBConnex(Param::$dsn, Param::$user, Param::$pass);
$_SESSION['Compte'] = 'visiteur';
if(isset($_GET['bioRelai'])){
	$_SESSION['bioRelai']= $_GET['bioRelai'];
}
else
{
	if(!isset($_SESSION['bioRelai'])){
		$_SESSION['bioRelai']="visiteurs";
	}
}




//connexion
if(isset($_POST["login"])){

	if(!empty($_POST["login"])){
	 //verification bon mdp et login

		//connex bdd
		$maConnex = $uneConnex->connexion(Param::$dsn, Param::$user, Param::$pass);
		//recup des login et MDP
		$login= $uneConnex->login($maConnex,$_POST["login"]);
		$mdp = $uneConnex->password($maConnex,$_POST["mdp"]);
		$utilisateurDonnee = new UtilisateurDAO();
		$tabUtilisateur = $utilisateurDonnee->UNUtilisateur($login);

		//teste si le mdp et le login correspond
		if($mdp == $_POST["mdp"] && $login == $_POST["login"]){


			//instanciation de la classe

			$unUtilisateur= new Utilisateur();
			$unUtilisateur->hydrate($tabUtilisateur);
			$_SESSION['unUtilisateur'] = serialize($unUtilisateur);
			$_SESSION['bioRelai'] = 'Visiteurs';
		}
	}
}



//Inscription

if(isset($_POST["loginI"])){

	if(!empty($_POST["loginI"])){
	 //verification bon mdp et login

		//connex bdd
		$maConnex = $uneConnex->connexion(Param::$dsn, Param::$user, Param::$pass);
		//recup des login et MDP
		$utilisateurDonnee = new UtilisateurDAO();

		$utilisateurDonnee->AjoutUtilisateur($_POST['email'],$_POST['prenom'],$_POST['nom'],$_POST['mdpI'],$_POST['loginI'],1);

		$_SESSION['bioRelai'] = 'Connexion';
	}
}







$bioRelai = new Menu("bioRelai");

if($_SESSION['Compte'] == 'visiteur'){

    $bioRelai->ajouterComposant($bioRelai->creerItemLien("Presentation", "Visiteurs"));
    $bioRelai->ajouterComposant($bioRelai->creerItemLien("connexion", "Connexion"));
    $bioRelai->ajouterComposant($bioRelai->creerItemLien("inscription", "Inscription"));
}



    $menuPrincipalbioRelai = $bioRelai->creerMenu('bioRelaiVisiteur','bioRelai');

    include_once dispatcher::dispatch($_SESSION['bioRelai']);
