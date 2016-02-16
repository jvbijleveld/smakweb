<?php

// src/AppBundle/Repository/InstructionMapper.php

namespace AppBundle\Repository;

use AppBundle\Domain\Instruction;
use AppBundle\Repository\IngredientMapper;

class InstructionMapper{
	
	private $instruction;
	private $ingredientMapper;
	
	public function map($instructionEntity){
		$instruction = new Instruction();
		$instruction->setId($instructionEntity->getId());
		$instruction->setInstruction($instructionEntity->getInstruction());

		foreach ($instructionEntity->getIngredients() as $ingredientEntity){
			$ingredientMapper = new IngredientMapper();
			$ingredient = $ingredientMapper->map($ingredientEntity);
			$instruction->addIngredient($ingredient);
		}
		
		return $instruction;
	}
}

?>