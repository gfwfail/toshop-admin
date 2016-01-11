<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        \View::composer(['good.*','store.*','deal.*'], 'App\Http\Composers\AdminComposer');
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
