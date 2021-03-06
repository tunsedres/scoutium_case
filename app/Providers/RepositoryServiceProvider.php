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

        $this->app->bind(
            'App\Repositories\InviteRepositoryInterface',
            'App\Repositories\InviteRepository'
        );

        $this->app->bind(
            'App\Repositories\UserWalletRepositoryInterface',
            'App\Repositories\UserWalletRepository'
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
