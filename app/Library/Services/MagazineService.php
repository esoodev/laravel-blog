<?php
namespace App\Library\Services;

use App\Category;
use App\Magazine;
use App\Tag;
use Log;

class MagazineService
{
    public function getAll()
    {
        return Magazine::all();
    }

    public function getAllPaginate($per_page)
    {
        return Magazine::orderby('created_at', 'DESC')->paginate($per_page);
    }

    public function getMagazineCount()
    {
        return Magazine::count();
    }

    public static function find($id)
    {
        return Magazine::find($id);
    }

    public function findOrFail($id)
    {
        return Magazine::findOrFail($id);
    }

    public function orderByDate(&$magazines, $orderBy)
    {
        if ($orderBy == 'DESC' || $orderBy == 'desc') {
            usort($magazines, function ($a, $b) {
                return strcmp($b->created_at, $a->created_at);
            });
        } else if ($orderBy == 'ASC' || $orderBy == 'asc') {
            usort($magazines, function ($a, $b) {
                return strcmp($a->created_at, $b->created_at);
            });
        } else {
            return $magazines;
        }
    }

    public function addPageView($magazine)
    {
        if ($magazine) {
            // $magazine->addPageViewThatExpiresAt(Carbon::now()->addHours(2));
            $magazine->addPageView(); // For dev
            return true;
        } else {
            return false;
        }
    }

    public function addPageViewById($id)
    {
        if ($magazine = Magazine::find($id)) {
            // $magazine->addPageViewThatExpiresAt(Carbon::now()->addHours(2));
            $magazine->addPageView(); // For dev
            return true;
        } else {
            return false;
        }
    }

    public function getPageViews($magazine)
    {
        if ($magazine) {
            return $magazine->getPageViews();
        } else {
            return -1;
        }
    }

    public function getPageViewsById($id)
    {
        if ($magazine = Magazine::find($id)) {
            return $magazine->getPageViews();
        } else {
            return -1;
        }
    }

    public function getCategory($magazine)
    {
        if ($magazine) {
            $category = Category::find($magazine->category_id);
            return $category;
        } else {
            return null;
        }
    }

    public function getComments($magazine)
    {
        if ($magazine) {
            return $magazine->comments;
        } else {
            return null;
        }
    }

    public function getCommentCount($magazine)
    {
        return count($this->getComments($magazine));
    }

    /**
     * Get n latest magazines.
     */
    public function getLatest($n)
    {
        if ($n > 0) {
            $magazines = Magazine::orderBy('id', 'desc')->take($n)->get();
            foreach ($magazines as &$magazine) {
                $magazine['views'] =
                $this->getPageViews($magazine);
                $magazine['comments_count'] =
                $this->getCommentCount($magazine);
            }
            return $magazines;
        } else {
            return null;
        }
    }

    /**
     * Get n randomly chosen magazines.
     */
    public function getRandom($n)
    {
        $result = [];

        while (sizeof($result) < $n) {
            $magazine = $this->find(rand(1, $this->getMagazineCount()));
            if (in_array($magazine, $result)) {
                continue;
            }
            array_push($result, $magazine);
        }

        return $result;
    }
}
