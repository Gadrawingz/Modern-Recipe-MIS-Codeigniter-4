<?php namespace App\Libraries;

use App\Models\RecipeModel;
use App\Models\IngredientModel;

class MyRecipes
{
    /**
     * Get all recipes
     * @return array
     */
    public function getAllRecipes ()
    {
        // Create an instance for our two models
        $recipeModel = new RecipeModel();
        $ingredientModel = new IngredientModel();

        // SELECT the recipes, order by id
        $recipes = $recipeModel
            ->orderBy('id')
            ->findAll();

        // For each recipe, SELECT its ingredients
        foreach ($recipes as &$recipe)
        {
            $recipe->ingredients = $ingredientModel
                ->where( ['recipe_id' => $recipe->id] )
                ->orderBy('id')
                ->findAll();
        }
        unset($recipe);

        return $recipes;
    }
}