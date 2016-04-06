<?php

// src/AppBundle/Repository/IngredientWrapper.php

namespace AppBundle\Repository;

use AppBundle\Entity\IngredientEntity;

Class IngredientWrapper{
	
	private $ingredientEntity;
	
	public function wrap($ingredient){
		$ingredientEntity = new IngredientEntity();
				
		$ingredientEntity->setName($ingredient->getName());
		$ingredientEntity->setAmmount($ingredient->getAmmount());
		$ingredientEntity->setDetails($ingredient->getDetails());
		
		return $ingredientEntity;
	}
	
	public function merge($ingredientEntity, $ingredient){
		$ingredientEntity->setName($ingredient->getName());
		$ingredientEntity->setAmmount($ingredient->getAmmount());
		$ingredientEntity->setDetails($ingredient->getDetails());
	
		return $ingredientEntity;
	}
}

?>