<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        /**
         * Provides baseStyle variable to the "api" layout
         */
        View::composer('layouts.api', function ($view) {
            $view->with('baseStyle', new HtmlString(Vite::content('resources/sass/api.scss')));
        });

    }
}
