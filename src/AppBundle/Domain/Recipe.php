<?php
// src/AppBundle/Domain/Entity

namespace AppBundle\Domain;

use Doctrine\Common\Collections\ArrayCollection;

Class Recipe {
	
	private $id;
	private $name;
	private $description;
	private $instructions;
	private $course;
	
	public function __construct() {
		$this->instructions = new ArrayCollection();
	}
		
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
	
	public function getDescription(){
		return $this->description;
	}
	
	public function setDescription($desc){
		$this->description = $desc;
		return $this;
	}
	
	public function addInstruction($instructions){
		$this->instructions[] = $instructions;
	}
	
	public function getInstructions(){
		return $this->instructions;
	}
	
	public function getCourse(){
		return $this->course;
	}
	
	public function setCourse($course){
		$this->course = $course;
		return $this;
	}
	
}
?>
