<?php

namespace App\Providers;

use App;
use App\User;
use Illuminate\Support\ServiceProvider;
use Log;

class ToshopServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function ($user) {
             $user->insertNode();
            Log::info($user->referrer.' '.$user->id.' has been added to user closure');
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('AccountService', function()
        {
            return new App\Services\AccountService;
        });

        App::bind('StatService', function()
        {
            return new App\Services\StatService;
        });

        App::bind('AdService', function()
        {
            return new App\Services\AdService;
        });

    }
}
