<?php
namespace App\Library\Services;

use App\Category;

class CategoryService
{
    public function getAll()
    {
        return Category::all();
    }

    public function getAllNames()
    {
        return array_column(Category::all()->toArray(), 'name');
    }

    public function getMagazineCount($category)
    {
        if ($category) {
            return count($category->magazines);
        } else {
            return -1;
        }
    }
}
