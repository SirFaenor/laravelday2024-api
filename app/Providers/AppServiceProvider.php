<?php

namespace App\Providers;

use App\Helpers\MoneyFormatter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        /**
         * Utilità legate ai prezzi
         * @toto refactoring con dep. ini. (ora viene usato globalmente al bisogno)
         */
        $this->app->singleton(MoneyFormatter::class, function ($app) {
            return new MoneyFormatter("EUR");
        });



    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        /**
         * Forza https nell'output delle url
         * (assets compresi)
         */
        // if (app()->environment("production") && env("FORCE_HTTPS") == true) {URL::forceScheme('https');}



    }
}
