<?php namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Recipe;

class RecipeModel extends Model
{
    // The MySQL table name
    protected $table = 'recipe';

    // The type of object to return
    protected $returnType = Recipe::Class;

    // The updatable fields
    protected $allowedFields = [
        'title',
        'instructions',
    ];
}