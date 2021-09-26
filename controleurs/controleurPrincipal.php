<?php


if(isset($_GET['bioRelai'])){

	//verification si il faut le rediriger vers controleur adherent
	if(!empty($_SESSION['unUtilisateur'])){

		$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);
		if($UnUtilisateur->getStatut() == 1){
				// rediriger vers le controleur adherent
				$_SESSION['navBarRequete'] = $_GET['bioRelai'];
					$_SESSION['bioRelai'] = "Adherents";


		}

	}
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

		//recup des login et MDP rajouter le function
		$login= $_POST["login"];
		$mdp = $_POST["mdp"];
		$tabUtilisateur = UtilisateurDAO::UNUtilisateur($login, $mdp);
		$_SESSION['authentification'] = $tabUtilisateur;

		if($_SESSION['authentification']){

			//instanciation de la classe
			$unUtilisateur= new Utilisateur();
			$unUtilisateur->hydrate($tabUtilisateur);
			$_SESSION['unUtilisateur'] = serialize($unUtilisateur);
			$_SESSION['bioRelai'] = 'Visiteurs';
			$_SESSION['Compte'] = 'inscrit';
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

if(!isset($_SESSION['unUtilisateur'])){
	$_SESSION['Compte'] = 'visiteur';
}

$bioRelai = new Menu("bioRelai");

if($_SESSION['Compte'] == 'visiteur'){
    $bioRelai->ajouterComposant($bioRelai->creerItemLien("Presentation", "Visiteurs"));
    $bioRelai->ajouterComposant($bioRelai->creerItemLien("connexion", "Connexion"));
    $bioRelai->ajouterComposant($bioRelai->creerItemLien("inscription", "Inscription"));
		$bioRelai->creerMenu('bioRelaiVisiteur','bioRelai');
}

//verifi si $_SESSION['unUtilisateur'] existe bien sinon il passe
if(isset($_SESSION['unUtilisateur'])){

		if(!empty($_SESSION['unUtilisateur'])){

				$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);
						echo $UnUtilisateur->getStatut();
				if ($UnUtilisateur->getStatut() == 1) {
					//redirection vert adherent
						$_SESSION['bioRelai'] = 'Adherents';
						var_dump($_SESSION['bioRelai']);
				    include_once dispatcher::dispatch($_SESSION['bioRelai']);
			}
		}
}
    include_once dispatcher::dispatch($_SESSION['bioRelai']);
