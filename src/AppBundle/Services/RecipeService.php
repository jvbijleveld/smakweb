<?php

// src/AppBundle/Services/RecipeService.php

namespace AppBundle\Services;

use AppBundle\Repository\RecipeRepository;
use AppBundle\Repository\RecipeMapper;
use AppBundle\Repository\RecipeRowMapper;
use AppBundle\Entity\IngredientEntity;
use AppBundle\Entity\RecipeEntity;
use AppBundle\Repository\IngredientWrapper;
use AppBundle\Repository\InstructionWrapper;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Class RecipeService extends RecipeRepository{
	
	private $recipeService;
	
	public function getRecipe($id){
		$mapper = new RecipeMapper();
		$recipeEntity = self::getRecipeById($id);
		if(!$recipeEntity){
			throw new NotFoundHttpException("Recipe ".$id ." not found");
		}
		return $mapper->map($recipeEntity);
	}
	
	public function getAllRecipes(){
		$mapper = new RecipeRowMapper();
		return $mapper->map(self::getAll());
	}
	
	public function createRecipe($name, $description, $course){
		$recipeEntity = new RecipeEntity();
		$mapper = new RecipeMapper();
				
		$recipeEntity->setName($name);
		$recipeEntity->setDescription($description);
		$recipeEntity->setCourse($course);
		$recipeEntity->setOwner("Me");
		
		self::flushRecipe($recipeEntity);
		return $mapper->map($recipeEntity);
	}
	
	public function updateRecipe($id, $recipe){
		//TODO: complex method, please refactor
		$mapper = new RecipeMapper();
		
		$recipeEntity = self::getRecipeById($id);
		$recipeEntity->setName($recipe->getName());
		$recipeEntity->setDescription($recipe->getDescription());
		$recipeEntity->setCourse($recipe->getCourse());
		
		foreach ($recipe->getInstructions() as $instruction){
			if(!empty($instruction->getInstruction())){
				if(!$instruction->getId()){
					$instructionEntity = self::addInstruction($recipeEntity, $instruction);
				}else{
					$instructionEntity = self::getInstructionById($instruction->getId());
					$instructionEntity->setInstruction($instruction->getInstruction());
				}
				
				foreach($instruction->getIngredients() as $ingredient){
					if(!$ingredient->getId()){
						$ingredientEntity = self::addIngredient($instructionEntity, $ingredient);
					}else{
						$ingredientEntity = self::getIngredientById($ingredient->getId());
						$ingredientEntity->setName($ingredient->getName());
						$ingredientEntity->setAmmount($ingredient->getAmmount());
						$ingredientEntity->setDetails($ingredient->getDetails());
					}			
				}
			} else {
				$instructionEntity = self::getInstructionById($instruction->getId());
				self::removeInstruction($recipeEntity, $instructionEntity);
			}
		}
		self::flushRecipe($recipeEntity);
		return $mapper->map($recipeEntity);
	}
	
	public function addIngredient($instructionEntity, $ingredient){
		$ingredientWrapper = new IngredientWrapper();
		if(!$ingredient->getName()){
			return;
		}
		$ingredientEntity = $ingredientWrapper->wrap($ingredient);
		$ingredientEntity->setInstructionEntity($instructionEntity);
		$instructionEntity->addIngredient($ingredientEntity);
	
		$this->em->persist($ingredientEntity);
		$this->em->flush();
	
		return $ingredientEntity;
	}
	
	public function addInstruction($recipeEntity, $instruction){
		$instructionWrapper = new InstructionWrapper();
		$instructionEntity = $instructionWrapper->wrap($instruction);
		$instructionEntity->setRecipeEntity($recipeEntity);
		$recipeEntity->addInstruction($instructionEntity);
		
		$this->em->persist($instructionEntity);
		$this->em->flush();
		
		return $instructionEntity;
	}
	
	private function removeInstruction($recipeEntity, $instructionEntity){
		$recipeEntity->removeInstruction($instructionEntity);
		$this->em->remove($instructionEntity);
		$this->em->flush();
	}
}

?>