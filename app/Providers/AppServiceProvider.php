<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Setting;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer(['layouts.nav', 'layouts.blog'], function ($view) {
            $settings = cache()->rememberForever(Setting::CACHE_KEY, function () {
                return Setting::first();
            });
            
            $view->with('settings', $settings);
        });

        view()->composer(['includes.header'], function ($view) {
            $categories = cache()->rememberForever(Category::CACHE_KEY, function () {
                return Category::orderBy('name', 'ASC')->take(5)->get();
            });

            $view->with('categories', $categories);
        });



        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
