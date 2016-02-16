<?php
// src/AppBundle/Repository/IngredientMapper.php

namespace AppBundle\Repository;

use AppBundle\Domain\Ingredient;
Class IngredientMapper {
	
	private $ingredient;
	
	public function map($ingredientEntity){
		$ingredient = new Ingredient();
		$ingredient->setId($ingredientEntity->getId());
		$ingredient->setName($ingredientEntity->getName());
		$ingredient->setAmmount($ingredientEntity->getAmmount());
		$ingredient->setDetails($ingredientEntity->getDetails());
		return $ingredient;
	}
}
?>