<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\MagazineService;
use App\Library\Services\CategoryService;
use App\Library\Services\TagService;

class MagazineServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\MagazineService', function ($app) {
            return new MagazineService();
        });

        $this->app->bind('App\Library\Services\CategoryService', function ($app) {
            return new CategoryService();
        });
        
        $this->app->bind('App\Library\Services\TagService', function ($app) {
            return new TagService();
        });
    }
}
