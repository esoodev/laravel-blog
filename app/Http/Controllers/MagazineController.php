<?php

namespace App\Http\Controllers;

use App\Magazine;
use App\Category;
use Illuminate\Support\Facades\Route;

use App\Library\Services\CategoryService;
use App\Library\Services\TagService;

class MagazineController extends Controller
{
    /**
     * Show the magazine for the given magazine id.
     *
     * @param  int  $id
     * @return Response
     */
    public function read($id, CategoryService $categoryService, TagService $tagService)
    {
        $parent_url = dirname($_SERVER['REQUEST_URI']);

        $magazine = Magazine::findOrFail($id);
        $magazine_prev = Magazine::find($id-1);
        $magazine_next = Magazine::find($id+1);
        $magazine_prev_url = ($magazine_prev) ? $parent_url."/".($id-1) : "/";
        $magazine_next_url = ($magazine_next) ? $parent_url."/".($id+1) : "/";
        $category = Category::findOrFail($magazine->category_id);
        $authors = $magazine->employeesHasRoleId(1);
        $tags = $magazine->tags;

        /**
         * TODO: link comments.
         */
        $comments = [1, 2, 3];

        return view('magazine.read', [
            'magazine' => $magazine,
            'magazine_prev' => $magazine_prev,
            'magazine_prev_url' => $magazine_prev_url,
            'magazine_next' => $magazine_next,
            'magazine_next_url' => $magazine_next_url,
            'category' => $category,
            'all_categories'=> $categoryService->getAllNames(),
            'all_tags'=> $tagService->getAllNames(),
            'authors' => $authors,
            'comments' => $comments,
            'tags' => $tags
        ]);
    }

}
