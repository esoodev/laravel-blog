<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Services\CategoryService;
use App\Library\Services\MagazineService;
use App\Library\Services\TagService;
use Carbon\Carbon;

class MainController extends Controller
{
    public function __construct(
        MagazineService $magazineService,
        CategoryService $categoryService,
        TagService $tagService
    ) {
        $this->magazineService = $magazineService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;

        // Get all tag names.
        $this->all_tag_names = $this->tagService->getAllNames();

        // Get all categories and the number of magazines that belong to each.
        $this->all_categories = $this->categoryService->getAll();
        foreach ($this->all_categories as &$category) {
            $category['count'] = $this->categoryService->getMagazineCount($category);
        }
    }
}
