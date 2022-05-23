<?php namespace App\Libraries;

use App\Models\RecipeModel;
use App\Models\IngredientModel;

class MyRecipes
{
    public $recipeModel;
    public $ingredientModel;

    public function __construct()
    {
        $this->recipeModel = new RecipeModel();
        $this->ingredientModel = new IngredientModel();
    }

    /**
     * Get the list of recipes
     * @param array $search
     * @return array
     */
    public function getListRecipes (array $search)
    {
        // Only get id, slug and title fields
        $this->recipeModel->select('id, slug, title');

        // If we do a text search, look in the title and instructions
        if ( ! empty($search['text']))
        {
            $this->recipeModel
                ->like('title', $search['text'])
                ->orLike('instructions', $search['text']);
        }
        
        
        /*****************************************************************************
          SELECT `id`, `slug`, `title`
          FROM `recipe`
          WHERE `title` LIKE '%bake at 350%' ESCAPE '!'
          OR `instructions` LIKE '%bake at 350%' ESCAPE '!'
          ORDER BY `id`
          LIMIT 10
        *****************************************************************************/

        // If we don't ask for a specific number of recipe per page, get the default value
        $nb_per_page = ! empty($search['nb_per_page']) ? $search['nb_per_page'] : null;

        // Add the sort order and pagination, then return the results
        $recipes = $this->recipeModel
            ->orderBy('id')
            ->paginate($nb_per_page);
        
        

        return $recipes;
    }

    /**
     * Get a recipe by its id
     * @param int $id
     * @return object|NULL
     */
    public function getRecipeById (int $id)
    {
        // Get the recipe by its id
        $recipe = $this->recipeModel->find($id);

        if ($recipe !== null)
        {
            $recipe->ingredients = $this->ingredientModel
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
        // Get the recipe by its slug
        $recipe = $this->recipeModel->where('slug', $slug)->first();

        if ($recipe !== null)
        {
            $recipe->ingredients = $this->ingredientModel
                ->where( ['recipe_id' => $recipe->id] )
                ->orderBy('id')
                ->findAll();
        }

        return $recipe;
    }
}
