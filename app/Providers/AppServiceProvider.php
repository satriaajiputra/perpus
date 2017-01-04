<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Publisher', function () {
            return new \App\Models\Publisher;
        });
        $this->app->singleton('Book', function () {
            return new \App\Models\Book;
        });
    }
}
