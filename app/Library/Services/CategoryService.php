<?php
namespace App\Library\Services;

use App\Category;

class CategoryService
{
    public function getAll()
    {
        return Category::all()->toArray();
    }

    public function getAllNames()
    {
        return array_column(Category::all()->toArray(), 'name');
    }
}
