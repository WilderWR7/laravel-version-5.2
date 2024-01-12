<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::resourceVerbs([
            'create'=>__('create'),
            'edit'=>__('edit')
        ]);
        Blade::if('admin', function () {
            return true;
        });
        Blade::if('production', function () {
            return !app()->isLocal();
        });

        Paginator::useBootstrap();
    }
}
