<?php

// src/AppBundle/Repository/IngredientNormalizer.php

namespace AppBundle\Repository;

use AppBundle\Domain\Ingredient;
Class IngredientNormalizer {

	private $ingredient;

	//TODO: put this in a proper normalizer
	public function normalize($object){
		$ingredient = new Ingredient();
		$ingredient->setId($object['id']);
		$ingredient->setName($object['name']);
		$ingredient->setAmmount($object['ammount']);
		$ingredient->setDetails($object['details']);
		return $ingredient;
	}
}
?>