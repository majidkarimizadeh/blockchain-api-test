<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\BTCController;
use App\Http\Controllers\ETHController;
use App\Services\BTCService;
use App\Services\ETHService;
use App\Proxy;

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
                return new BTCService();
            });

        $this->app->when(ETHController::class)
            ->needs(Proxy::class)
            ->give(function () {
                return new ETHService();
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
