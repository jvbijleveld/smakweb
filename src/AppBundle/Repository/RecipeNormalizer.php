<?php

// src/AppBundle/Repository/RecipeNormalizer

namespace AppBundle\Repository;

use AppBundle\Domain\Recipe;
use AppBundle\Domain\Ingredient;
use AppBundle\Domain\Instruction;
use AppBundle\Repository\IngredientNormalizer;
use AppBundle\Repository\BaseNormalizer;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class RecipeNormalizer extends BaseNormalizer{
	
	private $recipe; 
	private $ingredientNormalizer;
	private $ingredient;
	
	public function normalize($object){
		try{
			$recipe = new Recipe();
			$recipe->setId(self::getDataValue($object, 'id'));
			$recipe->setName(self::getDataValue($object, 'name'));
			
			$recipe->setDescription(self::getDataValue($object, 'description'));
			$recipe->setCourse(self::getDataValue($object, 'course'));
	
	 		foreach($object['instructions'] as $instructionObject){
	 			$instruction = new Instruction();
				$instruction->setId(self::getDataValue($instructionObject,'id'));
				$instruction->setInstruction(self::getDataValue($instructionObject,'instruction'));
				
				foreach($instructionObject['ingredients'] as $ingredientObject){
					$ingredientNormalizer = new IngredientNormalizer();
					$ingredient = $ingredientNormalizer->normalize($ingredientObject);
					$instruction->addIngredient($ingredient);
				}
	 			$recipe->addInstruction($instruction);
	 		}
			return $recipe;
		}catch(\Exception $e){
			throw new BadRequestHttpException("illegal format"); 
		}	
	}

}

?>