<?php
// src/AppBundle/Repository/RecipeMapper.php 

namespace AppBundle\Repository;

use AppBundle\Domain\Recipe;
use AppBundle\Repository\InstructionMapper;

class RecipeMapper{
	
	private $recipe;
	private $instructionMapper;
	
	public function map($recipeEntity){
		$recipe = new Recipe();
		$recipe->setId($recipeEntity->getId());
		$recipe->setName($recipeEntity->getName());
		$recipe->setCourse($recipeEntity->getCourse());
		$recipe->setDescription($recipeEntity->getDescription());

		foreach ($recipeEntity->getInstructions() as $instructionEntity){
			$instructionMapper = new InstructionMapper();
			$instruction = $instructionMapper->map($instructionEntity);
			$recipe->addInstruction($instruction);
		}
		return $recipe;
	}
}

?>