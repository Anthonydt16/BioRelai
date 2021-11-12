<?php
if(isset($_GET['idProduit'])){
  echo $_GET['idProduit'];
}
//recup de la donnee
if(isset($_GET['idProduit'])){
	$_SESSION['idProduit'] = $_GET['idProduit'];

}
if(isset($_GET['bioRelai'])){

	//verification si il faut le rediriger vers controleur adherent
	if(!empty($_SESSION['unUtilisateur'])){

		$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);
		if($UnUtilisateur->getStatut() == 1){
				// rediriger vers le controleur adherent
				$_SESSION['navBarRequete'] = $_GET['bioRelai'];
					$_SESSION['bioRelai'] = "Adherents";


		}
		elseif($UnUtilisateur->getStatut() == "Prod"){
			$_SESSION['navBarRequete'] = $_GET['bioRelai'];
			$_SESSION['bioRelai'] = "Producteur";
		}
		elseif($UnUtilisateur->getStatut() == 'RESP'){
			$_SESSION['navBarRequete'] = $_GET['bioRelai'];
					$_SESSION['bioRelai'] = 'BioRelai';
		}

	}
		$_SESSION['bioRelai']= $_GET['bioRelai'];
	}
else
{

		$_SESSION['bioRelai']="visiteurs";
		$_SESSION['Compte'] = "visiteur";

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
		$maConnex = new DBConnex();

		$maConnex = $maConnex->connexion(Param::$dsn, Param::$user, Param::$pass);
		//recup des login et MDP
		$utilisateurDonnee = new UtilisateurDAO();

		$utilisateurDonnee->AjoutUtilisateur($_POST['email'],$_POST['prenom'],$_POST['nom'],$_POST['mdpI'],$_POST['loginI'],1);
    $utilisateurDonnee->Ajoutadhrent($idAd,$idUser);

		$_SESSION['bioRelai'] = 'Connexion';
	}
}

//Modif bio relai

if(isset($_POST["loginIMBio"])){

	if(!empty($_POST["loginIMBio"])){
		$maConnex = new DBConnex();

		$maConnex = $maConnex->connexion(Param::$dsn, Param::$user, Param::$pass);
		//recup des login et MDP
		$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);

		$utilisateurDonneeModifBioRelai=BioRelaiDAO::ModifCompteBioRelai($_POST['loginIMBio'],$_POST['mdpIMBio'],$UnUtilisateur->getIdUser());

		$_SESSION['bioRelai'] = 'Connexion';

	}
}

//Nouveau Prod

if(isset($_POST["loginIMBio"])){

	if(!empty($_POST["loginIMBio"])){
		$maConnex = new DBConnex();

		$maConnex = $maConnex->connexion(Param::$dsn, Param::$user, Param::$pass);
		//recup des login et MDP
		$UnUtilisateur= unserialize($_SESSION['unUtilisateur']);

		$utilisateurDonneeModifBioRelai=BioRelaiDAO::ModifCompteBioRelai($_POST['loginIMBio'],$_POST['mdpIMBio'],$UnUtilisateur->getIdUser());

		$_SESSION['bioRelai'] = 'Connexion';

	}
}

////////////partie producteur///////////////////////////////////////////////////////////////
if(isset($_POST['mdp'], $_POST['Cmdp'], $_POST['nAdr'], $_POST['nComm'], $_POST['nCodeP'], $_POST['nPres'])){

	if($_POST['mdp']== $_POST['Cmdp']){
		ProducteurDAO::ModifCompteProducteur($_SESSION['authentification']['idUser'],$_POST['mdp'],$_POST['nAdr'], $_POST['nComm'], $_POST['nCodeP'], $_POST['nPres']);

		$_POST['mdp']=null;
		$_POST['Cmdp']=null;
		$_POST['nAdr']=null;
		$_POST['nComm']=null;
		$_POST['nCodeP']=null;
		$_POST['nPres']=null;
	}

}
//Ajouter un produit
if(isset($_POST['alibP'],$_POST['adesP'],$_POST['acatP'])){
  ProduitDAO::ajouterProduit($_POST['alibP'],$_POST['adesP'],$_POST['acatP']);
  $_POST['alibP']=null;
  $_POST['adesP']=null;
  $_POST['acatP']=null;
}

//Supprimer un produit
if(isset($_POST['psupp'])){
  ProduitDAO::supprimerProduit($_POST['psupp']);
  $_POST['psupp']=null;
}

//Modifier un produit
if(isset($_POST['mlibP'],$_POST['mdesP'],$_POST['mcatP'],$_POST['idP'])){
  ProduitDAO::modifierProduit($_POST['idP'],$_POST['mlibP'],$_POST['mdesP'],$_POST['mcatP']);
  $_POST['mlibP']=null;
  $_POST['mdesP']=null;
  $_POST['mcatP']=null;
  $_POST['idP']=null;
}

//proposer un produit à la ventes
if(isset($_POST['prodP'],$_POST['idV'],$_POST['quantiteP'],$_POST['prixP'],$_POST['uniteP'])){
  ProducteurDAO::proposer($_POST['prodP'],$_POST['idV'],$_POST['quantiteP'],$_POST['prixP'],$_POST['uniteP']);
  $_POST['prodP']=null;
  $_POST['idV']=null;
  $_POST['quantiteP']=null;
  $_POST['prixP']=null;
  $_POST['uniteP']=null;
}

//supprimer une proposition de vente d'un produit
if(isset($_POST['SprodP'],$_POST['idV'])){
  ProducteurDAO::suppProposer($_POST['idV'],$_POST['SprodP']);
  $_POST['idV']=null;
  $_POST['SprodP']=null;
}

//modifier une proposition de vente d'un produit
if(isset($_POST['idP'],$_POST['idV'],$_POST['mquantiteP'],$_POST['mprixP'],$_POST['muniteP'])){

  ProducteurDAO::modifProposer($_POST['idP'],$_POST['idV'],$_POST['mquantiteP'],$_POST['mprixP'],$_POST['muniteP']);
  $_POST['idP']=null;
  $_POST['idV']=null;
  $_POST['mquantiteP']=null;
  $_POST['mprixP']=null;
  $_POST['muniteP']=null;
}

///////////////////////////////////////////////////////////////////////////////////////////////


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
				if ($UnUtilisateur->getStatut() == 1) {
					//redirection vers adherent
						$_SESSION['bioRelai'] = 'Adherents';

				    include_once dispatcher::dispatch($_SESSION['bioRelai']);
			}
			if ($UnUtilisateur->getStatut() == 'Prod') {
						//redirection vers producteur
						$_SESSION['bioRelai'] = 'Producteur';
						include_once dispatcher::dispatch($_SESSION['bioRelai']);
				}
			if ($UnUtilisateur->getStatut() == 'RESP') {


				$_SESSION['bioRelai'] = 'BioRelai';
			include_once dispatcher::dispatch($_SESSION['bioRelai']);
	}
		}
}
    include_once dispatcher::dispatch($_SESSION['bioRelai']);
