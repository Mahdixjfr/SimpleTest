<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        Paginator::useBootstrap();
        // if (Auth::check() == true) {
        //     view()->composer('*', function ($view) {
        //         $header_carts = Cart::where('user_id', Auth::user()->id)->get();
        //         $view->with([
        //             'header_carts' =>  $header_carts,
        //             "categories" => Category::all(),
        //         ]);
        //     });
        // }
        view()->share([
            "categories" => Category::all(),
        ]);
    }
}
