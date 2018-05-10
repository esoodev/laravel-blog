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
        $magazines = $this->magazineService->getAll();
        $magazine_rands = $this->magazineService->getRandom(6);
        $this->magazineService->orderByDate($magazine_rands, 'DESC');

        return view('index', [
            'magazines' => $magazines,
            'magazine_rands' => $magazine_rands,
            'magazine_latests' => $this->magazineService->getLatest(3),
            'all_categories' => $this->all_categories,
            'all_tags' => $this->all_tag_names,
        ]);
    }
}
