<?php

// src/AppBundle/Domain/Ingredient.php

namespace AppBundle\Domain;

use Doctrine\Common\Collections\ArrayCollection;

class Instruction{
	
	private $id;
	private $instruction;
	private $ingredients;
	
	public function __construct() {
		$this->ingredients = new ArrayCollection();
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
		return $this;
	}
	
	public function getInstruction(){
		return $this->instruction;
	}
	
	public function setInstruction($instruction){
		$this->instruction = $instruction;
		return $this;
	}
	
	public function addIngredient($ingredient){
		$this->ingredients[] = $ingredient;
	}
	
	public function getIngredients(){
		return $this->ingredients;
	}
	
}

?>