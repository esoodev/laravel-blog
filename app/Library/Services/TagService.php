<?php
namespace App\Library\Services;

use App\Tag;

class TagService
{
    public function getAll()
    {
        return Category::all()->toArray();
    }

    public function getAllNames()
    {
        return array_column(Tag::all()->toArray(), 'name');
    }
}