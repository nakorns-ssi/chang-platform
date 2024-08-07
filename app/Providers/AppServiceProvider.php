<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        // 
        if (\Request::server('HTTP_X_FORWARDED_PROTO') == 'https')
        {
            \URL::forceScheme('https');
        }
    }
}
