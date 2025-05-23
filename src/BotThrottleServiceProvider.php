<?php

namespace BotThrottle;

use Illuminate\Support\ServiceProvider;
use BotThrottle\Middleware\DetectBot;
use BotThrottle\Middleware\ThrottleRequests;

class BotThrottleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/botthrottle.php' => config_path('botthrottle.php'),
        ], 'botthrottle-config');

        $router = $this->app['router'];
        $router->aliasMiddleware('detect.bot', DetectBot::class);
        $router->aliasMiddleware('throttle.bot', ThrottleRequests::class);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/botthrottle.php', 'botthrottle');

        if (!empty(config('botthrottle.log_channel.botthrottle'))) {
            config(['logging.channels.botthrottle' => config('botthrottle.log_channel.botthrottle')]);
        }
    }
}
