<?php

namespace App\Http\Controllers;

use App\Library\Services\CategoryService;
use App\Library\Services\MagazineService;
use App\Library\Services\TagService;

class MagazineController extends Controller
{
    /**
     * Show the magazine for the given magazine id.
     *
     * @param  int  $id
     * @return Response
     */
    public function read($id, CategoryService $categoryService,
        TagService $tagService, MagazineService $magazineService) {
        $parent_url = dirname($_SERVER['REQUEST_URI']);
        $magazineService->addPageView($magazine = $magazineService->findOrFail($id)); // Find magazine by the id and increment page view count.

        $magazine_latests = $magazineService->getLatest(3); // Get three latest posts to be put into the latest post widget.
        foreach ($magazine_latests as &$latest) {
            $latest['views'] = $magazineService->getPageViews($latest);
        }

        $magazine_prev = $magazineService->find($id - 1);
        $magazine_next = $magazineService->find($id + 1);
        $magazine_prev_url = ($magazine_prev) ? $parent_url . "/" . ($id - 1) : "/";
        $magazine_next_url = ($magazine_next) ? $parent_url . "/" . ($id + 1) : "/";

        $all_categories = $categoryService->getAll();
        foreach ($all_categories as &$category) {
            $category['count'] = $categoryService->getMagazineCount($category);
        }

        $magazine_category = $magazineService->getCategory($magazine);
        $authors = $magazineService->getAuthors($magazine);
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
            'magazine_category' => $magazine_category,
            'magazine_latests' => $magazine_latests,
            'page_views' => $magazineService->getPageViews($magazine),
            'all_categories' => $all_categories,
            'all_tags' => $tagService->getAllNames(),
            'authors' => $authors,
            'comments' => $comments,
            'tags' => $tags,
        ]);
    }

}
