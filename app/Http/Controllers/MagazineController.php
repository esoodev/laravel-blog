<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MainController;
use Log;

class MagazineController extends MainController
{

    /**
     * Show all the magazines.
     *
     * @param  int  $id
     * @return Response
     */
    public function overview()
    {
        $magazines = $this->magazineService->getAllPaginate(8);

        return view('magazine.overview', [
            'magazines' => $magazines,
            'magazine_latests' => $this->magazineService->getLatest(3),
            'all_categories' => $this->all_categories,
            'all_tags' => $this->all_tag_names,
        ]);
    }
    
    /**
     * Show the magazines for the given category name.
     *
     * @param  String  $category_name
     * @return Response
     */
    public function overviewCategory($category_name)
    {
        $magazines = $this->categoryService->getMagazines($category_name, 8);

        return view('magazine.overview', [
            'magazines' => $magazines,
            'magazine_latests' => $this->magazineService->getLatest(3),
            'all_categories' => $this->all_categories,
            'all_tags' => $this->all_tag_names,
        ]);
    }

    /**
     * Show the magazines for the given magazine id.
     *
     * @param  String  $tag_name
     * @return Response
     */
    public function overviewTag($tag_name)
    {
        $magazines = $this->tagService->getMagazines($tag_name, 8);

        return view('magazine.overview', [
            'magazines' => $magazines,
            'magazine_latests' => $this->magazineService->getLatest(3),
            'all_categories' => $this->all_categories,
            'all_tags' => $this->all_tag_names,
        ]);
    }
    
    /**
     * Show the magazines for the given search query.
     *
     * @param  String  $query
     * @return Response
     */
    public function overviewSearch(Request $request)
    {
        $url = $request->fullUrl();
        $magazines = $this->searchService->magazinesPaginate($_GET['query'], 8);

        return view('magazine.overview', [
            'magazines' => $magazines,
            'magazine_latests' => $this->magazineService->getLatest(3),
            'all_categories' => $this->all_categories,
            'all_tags' => $this->all_tag_names,
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

        // Get previous and next magazines and their appropriate urls.
        $parent_url = dirname($_SERVER['REQUEST_URI']);
        $magazine_prev = $this->magazineService->find($id - 1);
        $magazine_next = $this->magazineService->find($id + 1);
        $magazine_prev_url = ($magazine_prev) ? $parent_url . "/" . ($id - 1) : "/";
        $magazine_next_url = ($magazine_next) ? $parent_url . "/" . ($id + 1) : "/";

        // Get the category of the current magazine.
        $magazine_category = $this->magazineService->getCategory($magazine);

        // Get the tags of the current magazine.
        $tags = $magazine->tags;

        return view('magazine.read', [
            'magazine' => $magazine,
            'page_views' => $this->magazineService->getPageViews($magazine),
            'magazine_prev' => $magazine_prev,
            'magazine_prev_url' => $magazine_prev_url,
            'magazine_next' => $magazine_next,
            'magazine_next_url' => $magazine_next_url,
            'magazine_category' => $magazine_category,
            'magazine_latests' => $this->magazineService->getLatest(3),
            'all_categories' => $this->all_categories,
            'all_tags' => $this->all_tag_names,
            'authors' => $magazine->authors,
            'tags' => $tags,
        ]);
    }

}
