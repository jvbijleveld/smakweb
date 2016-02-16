
var SmakWeb = angular.module('smakWeb',['ngRoute','recipeControllers']);


SmakWeb.config(['$routeProvider', 
    function($routeProvider){
		$routeProvider.
		when('/recipe/:recipeId',{
			templateUrl: 'templates/show_recipe.html',
			controller: 'ShowRecipeCtrl'
		}).
		when('/recipe/edit/:recipeId',{
			templateUrl: 'templates/edit_recipe.html',
			controller: 'ShowRecipeCtrl'
		}).
		when('/list',{
			templateUrl: 'templates/list_recipe.html',
			controller: 'ListRecipeCtrl'
		}).
		otherwise({
			redirectTo: '/list'
		});
	}
]);	


