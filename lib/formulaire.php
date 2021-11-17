<?php
class Formulaire{
	private $method;
	private $action;
	private $nom;
	private $style;
	private $formulaireToPrint;

	private $ligneComposants = array();
	private $tabComposants = array();

	public function __construct($uneMethode, $uneAction , $unNom,$unStyle ){
		$this->method = $uneMethode;
		$this->action =$uneAction;
		$this->nom = $unNom;
		$this->style = $unStyle;
	}


	public function concactComposants($unComposant , $autreComposant ){
		$unComposant .=  $autreComposant;
		return $unComposant ;
	}

	public function ajouterComposantLigne($unComposant){
		$this->ligneComposants[] = $unComposant;
	}

	public function ajouterComposantTab(){
		$this->tabComposants[] = $this->ligneComposants;
		$this->ligneComposants = array();
	}

	public function creerTitre($unLabel,$class){
	    $composant = "<h1 class='".$class."'>" . $unLabel . "</h1>";
	    return $composant;
	}

	public function creerLabel($unLabel,$class){
		$composant = "<label  class='".$class."'>" . $unLabel . "</label>";
		return $composant;
	}

	public function creerMessage($unMessage,$class){
		$composant = "<label  class='".$class."''>" . $unMessage . "</label>";
		return $composant;
	}


	public function creerInputTexte($unNom, $unId, $uneValue , $required , $placeholder , $pattern,$class){
		$composant = "<input  class='".$class."' type = 'text' name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($uneValue)){
			$composant .= "value = '" . $uneValue . "' ";
		}
		if (!empty($placeholder)){
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ( $required = 1){
			$composant .= "required ";
		}
		if (!empty($pattern)){
			$composant .= "pattern = '" . $pattern . "' ";
		}
		$composant .= "/>";
		return $composant;
	}

	public function creerInputCheckBox($unNom, $unId, $uneValue , $checked,$disabled  , $placeholder, $pattern,$class){
		$composant = "<input  class='".$class."' type = 'checkbox' name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($uneValue)){
			$composant .= "value = '" . $uneValue . "' ";
		}
		if (!empty($disabled)){
			$composant .= "disabled = '" . $disabled . "' ";
		}
		if (!empty($placeholder)){
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ( $checked != false){
			$composant .= "checked ";
		}
		if (!empty($pattern)){
			$composant .= "pattern = '" . $pattern . "' ";
		}
		$composant .= "/>";
		return $composant;
	}

	public function creerInputDate($unNom, $unId, $uneValue , $required , $placeholder , $pattern,$class){
		$composant = "<input  class='".$class."' type = 'date' name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($uneValue)){
			$composant .= "value = '" . $uneValue . "' ";
		}
		if (!empty($placeholder)){
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ( $required = 1){
			$composant .= "required ";
		}
		if (!empty($pattern)){
			$composant .= "pattern = '" . $pattern . "' ";
		}
		$composant .= "/>";
		return $composant;
	}

	public function creerInputNombre($unNom, $unId, $unMax , $required , $placeholder , $pattern,$class){
		$composant = "<input  class='".$class."' type = 'number' min = '1' max = '" . $unMax . "'  name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($placeholder)){
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ( $required = 1){
			$composant .= "required ";
		}
		if (!empty($pattern)){
			$composant .= "pattern = '" . $pattern . "' ";
		}
		$composant .= "/>";
		return $composant;
	}

public function creerInputDescription($unNom, $unId, $uneValue , $required , $placeholder , $pattern,$class, $rows){
		$composant = "<input  class='".$class."' type = 'text' name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($uneValue)){
			$composant .= "value = '" . $uneValue . "' ";
		}
		if (!empty($placeholder)){
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ( $required = 1){
			$composant .= "required ";
		}
		if (!empty($pattern)){
			$composant .= "pattern = '" . $pattern . "' ";
		}
		if ($rows > 1){
			$composant .= "rows = '" . $rows . "' ";
		}
		$composant .= "/>";
		return $composant;
	}


	public function creerInputMdp($unNom, $unId,  $required , $placeholder , $pattern,$class){
		$composant = "<input  class='".$class."' type = 'password' name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($placeholder)){
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ( $required = 1){
			$composant .= "required ";
		}
		if (!empty($pattern)){
			$composant .= "pattern = '" . $pattern . "' ";
		}
		$composant .= "/>";
		return $composant;
	}

	public function creerLabelFor($unFor,  $unLabel, $class){
		$composant = "<label  class='".$class."' for='" . $unFor . "'>" . $unLabel . "</label>";
		return $composant;
	}

	public function creerSelect($unNom, $unId, $unLabel, $options, $class){
		$composant = "<select  class='".$class."'  name = '" . $unNom . "' id = '" . $unId . "' >";
		foreach ($options as $option){
			$composant .= "<option value = ".$option.">".$option."</option>" ;
		}
		$composant .= "</select></td></tr>";
		return $composant;
	}

	public function creerSelectWith2Options($unNom, $unId, $unLabel, $options,$options2, $class){
		$composant = "<select  class='".$class."'  name = '" . $unNom . "' id = '" . $unId . "' >";
		foreach ($options as $option){
			$composant .= "<option value = ".$option.">".$option." ".$options2."</option>" ;
		}
		$composant .= "</select></td></tr>";
		return $composant;
	}

	public function creerSelectID($unNom, $unId, $tabIntitule, $tabId){
		$composant = "<select  name = " . $unNom . " id = " . $unId . ">";
		for ($i=0;$i<count($tabId);$i++){
			$composant .= "<option value = ".$tabId[$i].">". $tabIntitule[$i] ."</option>" ;
		}
		$composant .= "</select>";
		return $composant;
	}

	public function creerInputSubmit($unNom, $unId, $uneValue, $class){
		$composant = "<input  class='".$class."' type = 'submit'  class='btn btn-primary btn-lg btn-block' name = '" . $unNom . "' id = '" . $unId . "' ";
		$composant .= "value = '" . $uneValue . "'/> ";
		return $composant;

	}
	public function creerInputHidden($unNom, $unId, $uneValue){
		$composant= "<input type ='hidden' name = '" . $unNom . "' id = '" . $unId . "' value = '" . $uneValue . "' />";
		return $composant;
	}
	public function creerButonSubmit($unNom, $unId, $uneValue, $class){
		$composant = "<button  class='".$class."' type = 'submit'  class='".$class."' name = '" . $unNom . "' id = '" . $unId . "'> ";
		$composant .= $uneValue."</button ";
		return $composant;

	}

	public function creerInputImage($unNom, $unId, $uneSource, $class){
		$composant = "<input  class='".$class."' type = 'image' name = '" . $unNom . "' id = '" . $unId . "' ";
		$composant .= "src = '" . $uneSource . "'/> ";
		return $composant;
	}


	public function creerFormulaire(){
		$this->formulaireToPrint = "<form method = '" .  $this->method . "' ";
		$this->formulaireToPrint .= "action = '" .  $this->action . "' ";
		$this->formulaireToPrint .= "name = '" .  $this->nom . "' ";
		$this->formulaireToPrint .= "class = '" .  $this->style . "' >";


		foreach ($this->tabComposants as $uneLigneComposants){
			$this->formulaireToPrint .= "<div class = 'ligne'>";
			foreach ($uneLigneComposants as $unComposant){
				$this->formulaireToPrint .= $unComposant ;
			}
			$this->formulaireToPrint .= "</div>";
		}
		$this->formulaireToPrint .= "</form>";
		return $this->formulaireToPrint ;
	}

	public function afficherFormulaire(){
		echo $this->formulaireToPrint ;
	}

}
