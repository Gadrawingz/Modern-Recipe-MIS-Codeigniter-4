<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RecipesSeeder extends Seeder
{
    public function run()
    {
        // Get an instance of the Query Builder for the RECIPE table
        $qb_recipe = $this->db->table('recipe');

        // Get an instance of the Query Builder for th INGREDIENT table
        $qb_ingredient = $this->db->table('ingredient');

        // Number of dummy recipe to create
        $nb_recipe = 500;

        // Loop 500 times
        for ($recipe_no = 1; $recipe_no <= $nb_recipe; $recipe_no++)
        {
            // Define a dummy recipe
            $recipe = [
                'title'  => "Dummy recipe {$recipe_no}",
                'slug' => "dummy-recipe-no-{$recipe_no}",
                'instructions' => <<<EOT
Add all the ingredients to a baking dish.
Bake at 350 °F (180 °C) for 45 minutes.
EOT
            ];

            // Insert this recipe
            $qb_recipe->insert($recipe);

            // Get the ID of the inserted recipe
            $recipe_id = $this->db->insertID();
            log_message('debug', "Inserted ID: $recipe_id");

            // Define 3 dummy ingredients associated to this recipe
            $ingredients = [
                [
                    'name' => "Ingredient A",
                    'quantity'  => "200 g",
                    'recipe_id'  => $recipe_id
                ],
                [
                    'name' => "Ingredient B",
                    'quantity'  => "50 g",
                    'recipe_id'  => $recipe_id
                ],
                [
                    'name' => "Ingredient C",
                    'quantity'  => "25 g",
                    'recipe_id'  => $recipe_id
                ]
            ];

            // Insert these 3 ingredients
            $qb_ingredient->insertBatch($ingredients);
        }
    }
}