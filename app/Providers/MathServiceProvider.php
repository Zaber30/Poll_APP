<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MathService;

class MathServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->singleton('math',function(){
              return new MathService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
