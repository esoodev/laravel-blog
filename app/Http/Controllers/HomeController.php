<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MainController;

class HomeController extends MainController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display the home page.
     *
     * @param  null
     * @return Response
     */
    public function index()
    {
        $magazine_latests = $this->magazineService->getLatest(3);
        $magazine_rands = $this->magazineService->getRandom(3);
        $this->magazineService->orderByDate($magazine_rands, 'DESC');

        return view('index', [
            'magazine_rands' => $magazine_rands,
            'magazine_latests' => $magazine_latests,
            'all_categories' => $this->all_categories,
            'all_tags' => $this->all_tag_names,
        ]);
    }
}
