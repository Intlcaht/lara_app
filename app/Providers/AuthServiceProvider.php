<?php

namespace App\Providers;

// use App\Models\Team;
// use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //Team::class => TeamPolicy::class,
        \Spatie\Permission\Models\Role::class => \App\Policies\RolePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function ($user, $ability) {
            if($user->hasRole('super_admin')) {
                return true;
            }
            else return $user->checkPermissionTo($ability) ?: null;
        });
    }
}
