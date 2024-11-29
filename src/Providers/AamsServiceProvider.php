<?php

namespace Aams\LaravelAams\Providers;

use Aams\LaravelAams\Services\Aams;
use Illuminate\Support\ServiceProvider;

class AamsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/aams.php' => config_path('aams.php'),
        ]);

        $this->app->singleton(Aams::class, function ($app) {
            return new Aams(
                token: config('aams.api_token'),
                endpoint: config('aams.api_endpoint')
            );
        });
    }
}