<?php
// src/AppBundle/Domain/Ingredient.php

namespace AppBundle\Domain;

Class Ingredient{

	protected $id;
	protected $name;
	protected $ammount;
	protected $details;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
		return $this;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setName($name){
		$this->name = $name;
		return $this;
	}
	
	public function setAmmount($ammount){
		$this->ammount = $ammount;
		return $this;
	}
	
	public function getAmmount(){
		return $this->ammount;
	}
	
	public function setDetails($details){
		$this->details = $details;
		return $this;
	}

	public function getDetails(){
		return $this->details;
	}
}

?>