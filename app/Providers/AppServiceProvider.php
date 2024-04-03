<?php

namespace App\Providers;

use Braintree\Gateway;
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

        // Singleton =  ci permette di avere 1 sola istanza di una classe
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '3zw8dmzkrmmttpqp',
                    'publicKey' => 'grvkx9hy9b6gntpt',
                    'privateKey' => '6c10fcc46471c1bc624765926af8f177',
                ]
            );
        });
    }
}
