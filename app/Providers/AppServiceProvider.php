<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // View'larda kullanmak için global değişken
        view()->composer('*', function ($view) {
            $cartCount = 0;
            if (session()->has('cart')) {
                $cart = session('cart');
                $cartCount = array_sum(array_column($cart, 'quantity'));
            }
            $view->with('cartCount', $cartCount);
        });
    }
}


