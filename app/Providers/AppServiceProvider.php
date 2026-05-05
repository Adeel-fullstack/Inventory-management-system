<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Set the application locale from session or default
        $locale = session('locale', config('app.locale'));
        app()->setLocale($locale);
        
        // Optional: Share current locale with all views
        view()->share('currentLocale', app()->getLocale());

    }
}