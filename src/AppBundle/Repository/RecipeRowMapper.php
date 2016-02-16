<?php

// src/AppBundle/Repository/RecipeRowMapper.php

namespace AppBundle\Repository;

use Symfony\Component\Intl\Data\Util\ArrayAccessibleResourceBundle;
use AppBundle\Domain\Recipe;
use AppBundle\Entity\RecipeEntity;

class RecipeRowMapper {

	private $recipe;
	private $ingredientMapper;
	
	public function map($recipeEntityArray){
		$recipeArray = array();
		
		foreach ($recipeEntityArray as $recipeEntity){
			$recipe = new Recipe();
			$recipe->setId($recipeEntity->getId());
			$recipe->setName($recipeEntity->getName());
			$recipe->setCourse($recipeEntity->getCourse());
			$recipe->setDescription($recipeEntity->getDescription());
			
			/* foreach ($recipeEntity->getIngredients() as $ingredientEntity){
				$ingredientMapper = new IngredientMapper();
				$ingredient = $ingredientMapper->map($ingredientEntity);
				$recipe->addIngredient($ingredient);
			} */
			array_push($recipeArray, $recipe);
		}

		return $recipeArray;
	}
	
}
