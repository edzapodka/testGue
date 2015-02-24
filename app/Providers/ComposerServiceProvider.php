<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer('app', 'App\Http\ViewComposers\ProfileComposer');

        // Using Closure based composers...
//        View::composer('dashboard', function()
//        {
//
//        });
    }

}