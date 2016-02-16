<?php

// src/AppBundle/Repository/InstructionWrapper.php

namespace AppBundle\Repository;

use AppBundle\Entity\IngredientEntity;
use AppBundle\Entity\InstructionEntity;
use AppBundle\Repository\IngredientWrapper;
use AppBundle\Services\RecipeService;

class InstructionWrapper{
	
	const RECIPE_SERVICE = 'recipe.service';
	
	private $instructionEntity;
	private $ingredientWrapper;
	private $ingredientRepository;
	
	public function wrap($instruction){
		$ingredientWrapper = new IngredientWrapper();
		$instructionEntity = new InstructionEntity();
		$instructionEntity->setinstruction($instruction->getInstruction());

		foreach($instruction->getIngredients() as $ingredient){
			$ingredientEntity = $ingredientWrapper->wrap($ingredient);
			$instructionEntity->addIngredient($ingredientEntity);
		}
		return $instructionEntity;
	}
	
	public function merge($instructionEntity, $instruction){
		$recipeService = $this->get(self::RECIPE_SERVICE);
		$ingredientWrapper = new IngredientWrapper();
		$instructionEntity->setinstruction($instruction->getInstruction());
		
		foreach($instruction->getIngredients() as $ingredient){
			$ingredientEntity = $recipeService->getIngredientById($ingredient->getId());
			
			if(is_null($ingredientEntity)){
				$ingredientEntity = $ingredientWrapper->wrap($ingredient);
				$instructionEntity->addIngredient($ingredientEntity);
			}else{
				$instructionEntity->removeIngredient($ingredientEntity);
				$ingredientEntity = $ingredientWrapper->merge($ingredientEntity, $ingredient);
				$instructionEntity->addIngredient($ingredientEntity);
			}
		}
		return $instructionEntity;
	}
}

?>