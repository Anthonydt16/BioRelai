<?php
class Commande{
//attribut
    use hydrate;
    private $idCommande;
    private $dateCommande;
    private $idAdherent;
    private $idVente;
    private $Etat;

    //constructeur
    public function __construct(){

    }

    //methode d'utilisateur
	public function getIdCommande() {
		return $this->idCommande;
	}

	public function setIdCommande($idCommande) {
		$this->idCommande = $idCommande;
	}

    public function getDateCommande() {
		return $this->dateCommande;
	}

	public function setDateCommande( $dateCommande) {
		$this->nomUser = $dateCommande;
	}

	public function getPrenomUser() {
		return $this->idAdherent;
	}

    public function setIdAdherent( $idAdherent) {
		$this->prenomUser = $idAdherent;
	}

	public function getIdAdherent() {
		return $this->idAdherent;
	}

	public function setIdVente( $idVente) {
		$this->login = $idVente;
	}

	public function getIdVente() {
		return $this->idVente;
	}

	public function setEtat( $Etat) {
		$this->statut = $Etat;
	}

	public function getEtat() {
		return $this->Etat;
	}


}
?>
