<?php

namespace App\Http\Controllers;

use App\Library\Services\CategoryService;
use App\Library\Services\MagazineService;
use App\Library\Services\TagService;

class MagazineController extends Controller
{

    public function __construct(
        MagazineService $magazineService,
        CategoryService $categoryService,
        TagService $tagService
    ) {
        $this->magazineService = $magazineService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
    }

    /**
     * Show the magazine for the given magazine id.
     *
     * @param  int  $id
     * @return Response
     */
    public function overview()
    {

        return view('magazine.overview', [

        ]);
    }

    /**
     * Show the magazine for the given magazine id.
     *
     * @param  int  $id
     * @return Response
     */
    public function read($id)
    {

        // Find magazine by the id and increment page view count.
        $this->magazineService->addPageView(
            $magazine = $this->magazineService->findOrFail($id));

        // Get three latest posts to be put into the latest post widget.
        $magazine_latests = $this->magazineService->getLatest(3);
        foreach ($magazine_latests as &$latest) {
            $latest['views'] = 
                $this->magazineService->getPageViews($latest);
            $latest['comments_count'] =
                $this->magazineService->getCommentsCount($latest);
        }

        // Get previous and next magazines and their appropriate urls.
        $parent_url = dirname($_SERVER['REQUEST_URI']);
        $magazine_prev = $this->magazineService->find($id - 1);
        $magazine_next = $this->magazineService->find($id + 1);
        $magazine_prev_url = ($magazine_prev) ? $parent_url . "/" . ($id - 1) : "/";
        $magazine_next_url = ($magazine_next) ? $parent_url . "/" . ($id + 1) : "/";

        // Get all categories and the number of magazines that belong to each.
        $all_categories = $this->categoryService->getAll();
        foreach ($all_categories as &$category) {
            $category['count'] = $this->categoryService->getMagazineCount($category);
        }

        // Get the category of the current magazine.
        $magazine_category = $this->magazineService->getCategory($magazine);

        // Get the authors of the current magazine.
        $authors = $this->magazineService->getAuthors($magazine);

        // Get the tags of the current magazine.
        $tags = $magazine->tags;

        return view('magazine.read', [
            'magazine' => $magazine,
            'magazine_prev' => $magazine_prev,
            'magazine_prev_url' => $magazine_prev_url,
            'magazine_next' => $magazine_next,
            'magazine_next_url' => $magazine_next_url,
            'magazine_category' => $magazine_category,
            'magazine_latests' => $magazine_latests,
            'magazine_comments' => $this->magazineService->getComments($magazine),
            'page_views' => $this->magazineService->getPageViews($magazine),
            'all_categories' => $all_categories,
            'all_tags' => $this->tagService->getAllNames(),
            'authors' => $authors,
            'tags' => $tags,
        ]);
    }

}
