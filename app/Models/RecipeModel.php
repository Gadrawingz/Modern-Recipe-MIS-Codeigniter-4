<?php namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Recipe;

class RecipeModel extends Model
{
    protected $table = 'recipe';
    protected $returnType = Recipe::Class;

    protected $allowedFields = [
        'title',
        'instructions',
        'slug',
    ];
}