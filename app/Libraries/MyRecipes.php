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


    /**
     * Get the list of recipes
     * @return array
     */
    public function getListRecipes ()
    {
        $recipeModel = new RecipeModel();

        // Only get id, slug and title fields
        $recipes = $recipeModel
            ->select('id, slug, title')
            ->orderBy('id')
            ->findAll();

        return $recipes;
    }




    /**
     * Get a recipe by its id
     * @param int $id
     * @return object|NULL
     */

    public function getRecipeById (int $id)
    {
        $recipeModel = new RecipeModel();
        $ingredientModel = new IngredientModel();

        // Get the recipe by its id
        $recipe = $recipeModel->find($id);

        if ($recipe !== null)
        {
            $recipe->ingredients = $ingredientModel
                ->where( ['recipe_id' => $recipe->id] )
                ->orderBy('id')
                ->findAll();
        }

        return $recipe;
    }


    /**
     * Get a recipe by its slug
     * @param string $slug
     * @return object|NULL
     */
    public function getRecipeBySlug (string $slug)
    {
        $recipeModel = new RecipeModel();
        $ingredientModel = new IngredientModel();

        // Get the recipe by its slug
        $recipe = $recipeModel->where('slug', $slug)->first();

        if ($recipe !== null)
        {
            $recipe->ingredients = $ingredientModel
                ->where( ['recipe_id' => $recipe->id] )
                ->orderBy('id')
                ->findAll();
        }

        return $recipe;
    }
}