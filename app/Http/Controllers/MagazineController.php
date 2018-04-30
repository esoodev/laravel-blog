<?php

namespace App\Http\Controllers;

use App\Magazine;
use App\Category;

class MagazineController extends Controller
{
    /**
     * Show the magazine for the given magazine id.
     *
     * @param  int  $id
     * @return Response
     */
    public function read($id)
    {
        $magazine = Magazine::findOrFail($id);
        $category = Category::findOrFail($magazine->category_id);

        return view('magazine.read', [
            'magazine' => $magazine,
            'category' => $category
        ]);
    }

}
