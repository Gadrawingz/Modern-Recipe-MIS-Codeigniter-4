<?php

namespace App\Controllers;

class RecipesController extends BaseController
{
    public function index()
    {
        // Collect all the data used by the view in a $data array
        $data = [
            'page_title' => "My Recipes",
            'page_subtitle' => "I present you my favorite recipes...",
            'recipes' => $this->_dummy_data(),
        ];

        /* Each of the items in the $data array will be accessible
         * in the view by variables with the same name as the key:
         * $page_title, $page_subtitle and $recipes
         */
        return view('recipe_list', $data);
    }

    /**
     * Dummy data because we don't have a model and a database yet.
     */
    private function _dummy_data ()
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