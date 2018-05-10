<?php
namespace App\Library\Services;

use App\Magazine;
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

    public function getMagazines($category_name, $per_page)
    {
        $category_id = Category::where('name', '=', $category_name)->first()->id;
        $magazines = Magazine::where('category_id', '=', $category_id)
            ->orderBy('created_at', 'desc')->paginate($per_page);

        return $magazines;
    }
}
