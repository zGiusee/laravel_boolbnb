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
                    'merchantId' => 'rd4zrc8bvjvynnz7',
                    'publicKey' => '9kpvzx92cbgvzh4n',
                    'privateKey' => '877856ae49b0caab8744822b99d7b210',
                ]
            );
        });
    }
}
