<?php

namespace App\Providers;

use App\Library\Services\CategoryService;
use App\Library\Services\CommentService;
use App\Library\Services\MagazineService;
use App\Library\Services\TagService;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(MagazineService::class, function ($app) {
            return new MagazineService();
        });

        $this->app->bind(CommentService::class, function ($app) {
            return new CommentService();
        });

        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService();
        });

        $this->app->bind(TagService::class, function ($app) {
            return new TagService();
        });
    }
}
