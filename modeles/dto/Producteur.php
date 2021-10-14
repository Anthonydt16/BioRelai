<?php
class Producteur{
//attribut
    use hydrate;
    private $mailProduct;
    private $adresseProduct;
    private $communeProduct;
    private $codePostalPoduct;
    private $presentationProduct;


    //constructeur
    public function __construct(){

    }

    //get and set de producteurs
	public function getMailProduct() {
		return $this->mailProduct;
	}

	public function setMailProduct($pmailProduct) {
		$this->mailProduct = $pmailProduct;
	}

    public function getAdresseProduct() {
		return $this->adresseProduct;
	}

	public function setAdresseProduct( $padresseProduct) {
		$this->adresseProduct = $padresseProduct;
	}

	public function getCommuneProduct() {
		return $this->communeProduct;
	}

    public function setCommuneProduct( $pcommuneProduct) {
		$this->communeProduct = $pcommuneProduct;
	}

	public function getCodePostalPoduct() {
		return $this->codePostalPoduct;
	}

	public function setCodePostalPoduct( $pcodePostalPoduct) {
		$this->codePostalPoduct = $pcodePostalPoduct;
	}

	public function getPresentationProduct() {
		return $this->presentationProduct;
	}

	public function setpresentationProduct( $ppresentationProduct) {
		$this->presentationProduct = $ppresentationProduct;
	}

}
?>
