<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class ProductServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\Product\ProductRepository', 'App\Repositories\Product\Impl\ConstArrayProduct');
    }
}
