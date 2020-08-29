<?php

namespace App\Providers;

use App\Model\Category;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::select(['name', 'slug'])->where('category_id', null)->get();
        view()->share('categories', $categories);
    }
}
