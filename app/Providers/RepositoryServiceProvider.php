<?php

namespace App\Providers;

use App\Repositories\Auth\UserRepository;
use App\Repositories\Auth\UserRepositoryEloquent;
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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\Auth\RegistrationRepository::class, \App\Repositories\Auth\RegistrationRepositoryEloquent::class);
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        //:end-bindings:
    }
}
