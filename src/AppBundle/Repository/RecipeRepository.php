<?php
// src/AppBundle/Repository/RecipeRepository.php

namespace AppBundle\Repository;

use AppBundle\Entity\RecipeEntity;
use AppBundle\Repository\RecipeMapper;
use Doctrine\ORM\EntityManager;

Class RecipeRepository{
	
	const RECIPE_ENTITY = 'AppBundle:RecipeEntity';
	const INSTRUCTION_ENTITY = 'AppBundle:InstructionEntity';
	const INGREDIENT_ENTITY = 'AppBundle:IngredientEntity';
	
	protected $em;
	
	public function __construct(EntityManager $entityManager) {
		$this->em = $entityManager;
	}

	protected function getAll(){
		return $this->em->getRepository(self::RECIPE_ENTITY)->findAll();
	}
	
	protected function getRecipeById($id){
		return $recipeEntity = $this->em->getRepository(self::RECIPE_ENTITY)->find($id);
	}
	
	protected function getInstructionById($id){
		return $this->em->getRepository(self::INSTRUCTION_ENTITY)->find($id);
	}
	
	protected function getIngredientById($id){
		return $this->em->getRepository(self::INGREDIENT_ENTITY)->find($id);
	}
	
	protected function flushRecipe($recipeEntity){
		$this->em->persist($recipeEntity);
		$this->em->flush();
	}
}
?>