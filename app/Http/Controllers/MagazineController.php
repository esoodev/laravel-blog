<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MainController;

class MagazineController extends MainController
{

    /**
     * Show the magazine for the given magazine id.
     *
     * @param  int  $id
     * @return Response
     */
    public function overview()
    {
        $magazines = $this->magazineService->paginate(8);

        foreach ($magazines as &$magazine) {
            // Get how many days, months, years past since the post.
            $magazine['days_ago'] =
            $this->magazineService->getDaysAgo($magazine);
        }

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
