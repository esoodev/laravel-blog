<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

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
        $magazine_rands = $this->magazineService->getRandom(3);
        
        foreach ($magazines as &$magazine) {
            // Get how many days, months, years past since the post.
            $magazine['days_ago'] = $this->magazineService->getDaysAgo($magazine);
        }

        foreach ($magazine_rands as &$magazine) {
            // Get how many days, months, years past since the post.
            $magazine['days_ago'] = $this->magazineService->getDaysAgo($magazine);
        }
        

        return view('index', [
            'magazines' => $magazines,
            'magazine_rands' => $magazine_rands,
            'magazine_latests' => $this->magazine_latests,
            'all_categories' => $this->all_categories,
            'all_tags' => $this->all_tag_names,
        ]);
    }
}
