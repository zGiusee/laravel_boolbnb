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
            return new Gateway([
                'environment' => env('GATEWAY_ENVIRONMENT'),
                'merchantId'  => env('GATEWAY_MERCHANT_ID'),
                'publicKey'   => env('GATEWAY_PUBLIC_KEY'),
                'privateKey'  => env('GATEWAY_PRIVATE_KEY'),
            ]);
        });
    }
}
