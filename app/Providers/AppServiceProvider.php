<?php

namespace App\Providers;

use App\Libraries\AuthService;
use App\Services\Auth\AuthService as AuthAuthService;
use Illuminate\Support\ServiceProvider;
use Tenancy\Identification\Contracts\ResolvesTenants;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // $this->app->resolving(ResolvesTenants::class, function (ResolvesTenants $resolver) {
        //     $resolver->addModel(User::class);

        //     return $resolver;
        // });
        $this->app->register(RepositoryServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(AuthService::class, AuthAuthService::class);
    }
}
