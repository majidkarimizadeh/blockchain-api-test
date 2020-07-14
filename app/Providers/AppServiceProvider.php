<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\BTCController;
use App\Http\Controllers\ETHController;
use App\Proxies\BTCProxy;
use App\Proxies\ETHProxy;
use App\Proxies\Proxy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(BTCController::class)
            ->needs(Proxy::class)
            ->give(function () {
                return new BTCProxy();
            });

        $this->app->when(ETHController::class)
            ->needs(Proxy::class)
            ->give(function () {
                return new ETHProxy();
            });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
