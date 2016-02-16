<?php

// src/AppBundle/Repository/RecipeWrapper.php

namespace AppBundle\Repository;

use AppBundle\Entity\RecipeEntity;
use AppBundle\Domain\Ingredient;
use AppBundle\Services\RecipeService;

Class RecipeWrapper {
	
	const RECIPE_SERVICE = 'recipe.service';
	
	private $recipeEntity;
	private $instructionRepo;
	private $instructionWrapper;

	public function wrap($recipe){
		$recipeEntity = new RecipeEntity();
		$recipeEntity->setId($recipe->getId());
		$recipeEntity->setName($recipe->getName());
		$recipeEntity->setDescription($recipe->getDescription());
		$recipeEntity->setCourse($recipe->getCourse());
		$recipeEntity->setOwner('Me');
		
		foreach ($recipe->getIngredients() as $ingredient){
			$ingredientWrapper = new IngredientWrapper();
			$ingredientEntity = $ingredientWrapper->wrap($ingredient);
			$ingredientEntity->setRecipeEntity($recipeEntity);
			$recipeEntity->addIngredient($ingredientEntity);
		}
		return $recipeEntity;
	}
	
	public function merge($recipeEntity, $recipe){
		$recipeService = $this->get(self::RECIPE_SERVICE);
		$instructionWrapper = new InstructionWrapper();
		
		$recipeEntity->setName($recipe->getName());
		$recipeEntity->setDescription($recipe->getDescription());
		$recipeEntity->setCourse($recipe->getCourse());
		
		foreach ($recipe->getInstructions() as $instruction){
			$instructionEntity = $recipeService->getInstructionById($instruction->getId());
			
			if(is_null($instructionEntity)){
				$instructionEntity = $instructionWrapper->wrap($instruction);
				$recipeEntity->addInstruction($instructionEntity);
			}else{
				$recipeEntity->removeInstruction($instructionEntity);
				$instructionEntity = $instructionWrapper->wrap($instructionEntity, $instruction);
				$recipeEntity->addInstruction($instructionEntity);
			}
		}
		return $recipeEntity;
	}
}

?>