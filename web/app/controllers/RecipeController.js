var recipeControllers = angular.module('recipeControllers',[]);



recipeControllers.controller('ShowRecipeCtrl',['$scope','$http','$routeParams',
    function($scope, $http, $routeParams){
		$http.get('/recipe/' + $routeParams.recipeId).success(function(data){
			$scope.recipe = data;
		});
		
		$scope.saveRecipe = function(data){
			$http({url: '/recipe/' + $routeParams.recipeId, method:'POST', data: data}).success(function(data){
				$scope.recipe = data;
			});
		};
		
		$scope.addIngredient = function(ingredient, instruction){
			ingredient.id = '';
			ingredient.details = '';
			if(instruction.ingredients == undefined){
				instruction.ingredients = new Array();
			}
			instruction.ingredients.push(ingredient);
			$scope.addInstruction(instruction);
		};
		
		$scope.addInstruction = function(data){
			//data.ingredients = newIngredients;
			data.id='';
			$scope.recipe.instructions.push(data);
			$scope.saveRecipe($scope.recipe);
			$scope.newInstruction = null;
		};
		
		$scope.saveAndClose = function(data){
			$scope.saveRecipe(data);
		};
	}
]);


recipeControllers.controller('ListRecipeCtrl',['$scope','$http','$routeParams',
	function($scope, $http, $routeParams){
		$scope.recipes = null;
		$http.get('/recipes').success(function(data){
			$scope.recipes = data;
		});
	}
]);