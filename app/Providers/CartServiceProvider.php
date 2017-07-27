<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class CartServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\Cart\CartRepository', 'App\Repositories\Cart\Impl\SessionCart');
    }
}
