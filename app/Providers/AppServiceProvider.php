<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
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
        View::composer('partials.header', function ($view) {
            $categories = Category::get(); // Truy vấn dữ liệu từ bảng categories
            $view->with('categories', $categories); // Chia sẻ dữ liệu với view
        });
    }
}
