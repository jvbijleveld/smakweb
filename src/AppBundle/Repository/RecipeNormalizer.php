<?php

// src/AppBundle/Repository/RecipeNormalizer

namespace AppBundle\Repository;

use AppBundle\Domain\Recipe;
use AppBundle\Domain\Ingredient;
use AppBundle\Domain\Instruction;
use AppBundle\Repository\IngredientNormalizer;

class RecipeNormalizer{
	
	private $recipe; 
	private $ingredientNormalizer;
	private $ingredient;
	
	public function normalize($object){
		$recipe = new Recipe();
		$recipe->setId($object['id']);
		$recipe->setName($object['name']);
		
		$recipe->setDescription($object['description']);
		$recipe->setCourse($object['course']);

 		foreach($object['instructions'] as $instructionObject){
 			$instruction = new Instruction();
			$instruction->setId($instructionObject['id']);
			$instruction->setInstruction($instructionObject['instruction']);
			
			foreach($instructionObject['ingredients'] as $ingredientObject){
				$ingredientNormalizer = new IngredientNormalizer();
				$ingredient = $ingredientNormalizer->normalize($ingredientObject);
				$instruction->addIngredient($ingredient);
			}
 			$recipe->addInstruction($instruction);
 		}
		return $recipe;		
	}
	
}