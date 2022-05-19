<?php namespace App\Controllers;

use App\Libraries\MyRecipes;

class RecipesController extends BaseController
{
    /**
     * List of recipes
     * @return string
     */
    public function index()
    {
        // Create an instance of our library
        $myRecipes = new MyRecipes();

        // Collect all the data used by the view in a $data array
        $data = [
            'page_title' => "My Recipes",
            'page_subtitle' => "I present you my favorite recipes...",
            'recipes' => $myRecipes->getListRecipes(),
            // Pass the paginnation class instance to the view
            'pager' => $myRecipes->recipeModel->pager,
        ];

        /* Each of the items in the $data array will be accessible
         * in the view by variables with the same name as the key:
         * $page_title, $page_subtitle, $recipes and $pager
         */
        return view('recipe_list', $data);
    }

    /**
     * One recipe
     * @param int $id
     * @return string
     */
    public function recipeById (int $id)
    {
        // Create an instance of our library
        $myRecipes = new MyRecipes();

        $data = [];

        /* Get the recipe for the id received in parameter.
         * If the recipe does not exist, throw a page not found exception (error 404)
         */
        if ( ! $data['recipe'] = $myRecipes->getRecipeById($id))
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('recipe', $data);
    }

    /**
     * One recipe
     * @param string $slug
     * @return string
     */
    public function recipeBySlug (string $slug)
    {
        // Create an instance of our library
        $myRecipes = new MyRecipes();

        $data = [];

        /* Get the recipe for the slug received in parameter.
         * If the recipe does not exist, throw a page not found exception (error 404)
         */
        if ( ! $data['recipe'] = $myRecipes->getRecipeBySlug($slug))
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('recipe', $data);
    }


    

    /**
     * Dummy data because we don't have a model and a database yet.
     */
    private function dummyData ()
    {
        return [
            [
                'title' => "Boiling Water",
                'ingredients' => ["Fresh water"],
                'instructions' => "Put the water in a cauldron and boil."
            ],
            [
                'title' => "Tea",
                'ingredients' => ["Fresh water", "Tea bag"],
                'instructions' => "Prepare the recipe for boiling water. Put the water in a cup, add the tea bag and let it steep for a few minutes."
            ],
            [
                'title' => "Coffee",
                'ingredients' => ["Fresh water", "Coffee", "Coffeine"],
                'instructions' => "Prepare Something & something is mixec with anything"
            ],
            [
                'title' => "Glass of water",
                'ingredients' => ["Fresh water", "Ice cubes", "Lemon slice (optional)"],
                'instructions' => "Put ice cubes in a tall glass and fill with water. Add a slice of lemon if desired."
            ],
        ];
    }
}