<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\EloquentRepositoryInterface',
            'App\Repositories\BaseRepository'
        );

        $this->app->bind(
            'App\Repositories\UserRepositoryInterface',
            'App\Repositories\UserRepository'
        );

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
