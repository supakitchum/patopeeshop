<?php

namespace App\Providers;

use App\Model\Catalog;
use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
//        \URL::forceScheme('https');
        Carbon::setLocale(config('app.locale'));
        Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
        Schema::defaultStringLength(191);
        view()->composer(
            '*',
            function ($view) {
                View::share([
                    'catalogs' => Catalog::all(),
                    'products_nav' => Product::limit(10)->get()
                ]);
            }
        );
    }
}
