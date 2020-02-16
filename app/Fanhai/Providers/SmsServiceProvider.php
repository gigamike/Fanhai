<?php

namespace Fanhai\Providers;

use Illuminate\Support\ServiceProvider;

use Fanhai\Services\Sms\Interfaces\SmsServiceInterface;
use Fanhai\Services\Sms\SmsService;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SmsServiceInterface::class, SmsService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
