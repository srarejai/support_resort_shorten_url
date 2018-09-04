<?php

// src/DemoServiceProvider.php

namespace SupportResort\ShortenUrl;

use Illuminate\Support\ServiceProvider;

class ShortenurlServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
         __DIR__.'/../config/config.php' => config_path('config.php'),
        ], 'config');

        require __DIR__ . '/Http/routes.php';
    }

    public function register()
    {
        $this->app->bind('support_resort_shorten_url', function() {
            return new Shortenurl();
        });

        $this->mergeConfigFrom( __DIR__.'/../config/config.php', 'config');
    }
}
