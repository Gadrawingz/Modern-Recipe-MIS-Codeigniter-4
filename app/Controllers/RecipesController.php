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
        // If a form was submitted
        if ($this->request->getMethod() === 'post')
        {
            // Get the form's search criteria
            $search = [
                'text' => $this->request->getPost('search_text'),
                'nb_per_page' => $this->request->getPost('search_nb_per_page'),
            ];
        }
        // Else, if search criteria have been saved to the session data
        else if (session('search_recipe') !== null)
        {
            // Get the search criteria from the session data
            $search = session('search_recipe');
        }
        else
        {
            // Default search criteria
            $search = [
                'text' => null,
                'nb_per_page' => null,
            ];
        }

        if ($search['nb_per_page'] !== null)
        {
            // Convert the value to 'int' (integer)
            $search['nb_per_page'] = (int)$search['nb_per_page'];

            // If negative or 0, set to null to get the default value from the Pager's configuration
            if ($search['nb_per_page'] <= 0)
            {
                $search['nb_per_page'] = null;
            }

            // No more than 100 recipes per page
            if ($search['nb_per_page'] > 100)
            {
                $search['nb_per_page'] = 100;
            }
        }

        // Save the search criteria to the session data
        session()->set('search_recipe', $search);

        // Create an instance of our library
        $myRecipes = new MyRecipes();

        // Collect all the data used by the view in a $data array
        $data = [
            'page_title' => "My Recipes",
            'page_subtitle' => "I present you my favorite recipes...",
            'recipes' => $myRecipes->getListRecipes($search),
            // Pass the search criteria to the view
            'search' => $search,
            // Pass the paginnation class instance to the view
            'pager' => $myRecipes->recipeModel->pager,
        ];

        // Load the form helper
        helper('form');

        /* Each of the items in the $data array will be accessible
         * in the view by variables with the same name as the key:
         * $page_title, $page_subtitle, $recipes, $search and $pager
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
}
