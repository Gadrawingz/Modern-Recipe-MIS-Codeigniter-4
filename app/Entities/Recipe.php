<?php namespace App\Entities;

use CodeIgniter\Entity;

class Recipe extends Entity
{
    public $ingredients;

    public function __construct (array $data = null)
    {
        parent::__construct($data);

        // Set the ingredient list to an empty array
        $this->ingredients = [];
    }
}