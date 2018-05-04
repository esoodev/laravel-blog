<?php
namespace App\Library\Services;

use App\Category;
use App\Magazine;

class MagazineService
{
    public function getAll()
    {
        return Magazine::all()->toArray();
    }

    public function find($id)
    {
        return Magazine::find($id);
    }

    public function findOrFail($id)
    {
        return Magazine::findOrFail($id);
    }

    public function addPageView($magazine)
    {
        if ($magazine) {
            // $magazine->addPageViewThatExpiresAt(Carbon::now()->addHours(2));
            $magazine->addPageView();   // For dev
            return true;
        } else {
            return false;
        }
    }

    public function addPageViewById($id)
    {
        if ($magazine = Magazine::find($id)) {
            // $magazine->addPageViewThatExpiresAt(Carbon::now()->addHours(2));
            $magazine->addPageView();   // For dev
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

    public function getAuthors($magazine)
    {
        if ($magazine) {
            $authors = $magazine->employeesHasRoleId(1);
            // return $authors;
            return ((count($authors) > 0) ? $authors : null);
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

    /**
     * Get n number of latest magazines.
     */
    public function getLatest($n) {
        if ($n > 0) {
            $magazines = Magazine::orderBy('id', 'desc')->take($n)->get();
            return $magazines;
        } else {
            return null;
        }
    }
}
