<?php
namespace App\Library\Services;

use App\Magazine;

class SearchService
{
    
    public function magazines($query_string)
    {
        return Magazine::search($query_string)->get();
    }

    public function magazinesPaginate($query_string, $per_page)
    {
        return Magazine::search($query_string)->paginate($per_page);
    }

}
