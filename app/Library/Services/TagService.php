<?php
namespace App\Library\Services;

use App\Magazine;
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

    public function getMagazines($tag_name, $per_page)
    {
        $tag_id = Tag::where('name', '=', $tag_name)->first()->id;

        $magazines = Magazine::whereHas('tags', function ($q) use ($tag_id) {
            return $q->where('id', '=', $tag_id);
        })->paginate($per_page);

        return $magazines;
    }
}