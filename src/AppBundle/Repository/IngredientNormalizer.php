<?php

// src/AppBundle/Repository/IngredientNormalizer.php

namespace AppBundle\Repository;

use AppBundle\Domain\Ingredient;
use AppBundle\Repository\BaseNormalizer;

Class IngredientNormalizer extends BaseNormalizer{

	private $ingredient;

	//TODO: put this in a proper normalizer
	public function normalize($object){
		$ingredient = new Ingredient();
		$ingredient->setId(self::getDataValue($object,'id'));
		$ingredient->setName(self::getDataValue($object,'name'));
		$ingredient->setAmmount(self::getDataValue($object,'ammount'));
		$ingredient->setDetails(self::getDataValue($object,'details'));
		return $ingredient;
	}
}
?>