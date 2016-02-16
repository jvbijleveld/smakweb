<?php
// src/AppBundle/Controller/RecipeController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Domain\Recipe;
use AppBundle\Domain\Ingredient;
use AppBundle\Services\RecipeService;
use AppBundle\Controller\BaseJsonResponse;
use AppBundle\Repository\IngredientNormalizer;
use AppBundle\Repository\RecipeNormalizer;

Class RecipeController extends BaseJsonResponse{
	
	const RECIPE_SERVICE = 'recipe.service';
	
	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * @Route("/recipe/{id}", name="getRecipe")
	 * @Method({"GET"})
	 */
	public function getRecipe($id){
		$recipeService = $this->get(self::RECIPE_SERVICE);
		$recipe = $recipeService->getRecipe($id);
		return $this->writeJson($recipe);
	}
	
	/**
	 * @Route("/recipe/{id}", name="saveRecipe")
	 * @Method({"POST"})
	 */
	public function saveRecipe($id, Request $request){
		$normalizer = New RecipeNormalizer();
		$recipeService = $this->get(self::RECIPE_SERVICE);
		$data = json_decode($request->getContent(), true);
		$recipe = $normalizer->normalize($data);
		
		$newrecipe = $recipeService->updateRecipe($id, $recipe);
		return $this->writeJson($newrecipe);
	}
	
	/**
	 * @Route("/recipes", name="getRecipeList")
	 * @Method({"GET"})
	 */
	public function getAllRecipes(){
		$recipeService = $this->get(self::RECIPE_SERVICE);
		$recipes = $recipeService->getAllRecipes();
		return $this->writeJson($recipes);
	}
	
	/**
	 * @Route("/recipe/create/{name}/{description}/{course}", name="createRecipeAction")
	 * @Method({"GET"})
	 */
	public function createRecipeAction($name, $description, $course){
		$recipeService = $this->get(self::RECIPE_SERVICE);
		$recipe = $recipeService->createRecipe($name, $description, $course);
		return $this->writeJson($recipe);
	}
	
}