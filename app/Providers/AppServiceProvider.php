<?php

namespace App\Providers;

use App\Models\Test;
use App\Observers\TestObserve;
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
        Test::observe(new TestObserve);
    }
}
