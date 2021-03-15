<?php

namespace App\Providers;

use App\DTOBuilder;
use Illuminate\Support\ServiceProvider;

class DTOServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DTOBuilder::class, function() {
            return new DTOBuilder();
        });
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
