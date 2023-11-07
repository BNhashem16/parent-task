<?php

namespace App\Providers;

use App\Class\DataMapper;
use App\Interface\DataSource;
use App\Interface\DataProcessor;
use App\Class\Provider1DataSource;
use App\Class\Provider2DataSource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
