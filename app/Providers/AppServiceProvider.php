<?php

namespace App\Providers;

use App\Filament\Resources\BusinessProfileAdapterResource;
use App\Filament\Resources\BusinessProfileAdapterTransactionResource;
use App\Filament\Resources\BusinessProfileResource;
use App\Filament\Resources\ServiceTagResource;
use App\Filament\Resources\Shield\RoleResource;
use App\Filament\Resources\UserResource;
use App\Filament\Resources\UserRoleResource;
use App\Libraries\Auth\AuthService;
use App\Models\Base\BusinessProfileAdapter;
use App\Services\Auth\AuthService as AuthAuthService;
use Illuminate\Support\ServiceProvider;
use Tenancy\Identification\Contracts\ResolvesTenants;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\UserMenuItem;

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

        Filament::serving(function () {
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label('Settings')
                    ->url(route('filament.pages.settings'))
                    ->icon('heroicon-s-cog'),
                // ...
            ]);
        });
        Filament::navigation(function (NavigationBuilder $builder): NavigationBuilder {
            return $builder->item(
                NavigationItem::make()
                    ->label('Dashboard')
                    ->icon('heroicon-o-home')
                    ->isActiveWhen(fn (): bool => request()->routeIs('filament.pages.dashboard'))
                    ->url(route('filament.pages.dashboard'))
            )->items(ServiceTagResource::getNavigationItems())
                ->group(
                    'Provider',
                    array_merge(
                        BusinessProfileResource::getNavigationItems(),
                    )
                )
                ->group('Adapters', array_merge(
                    BusinessProfileAdapterResource::getNavigationItems(),
                    BusinessProfileAdapterTransactionResource::getNavigationItems()
                ))->group('Services', [
                    // An array of `NavigationItem` objects.
                ])->group('Projects', [
                    // An array of `NavigationItem` objects.
                ])->group('Orders', [
                    // An array of `NavigationItem` objects.
                ])->group('Escrow', [
                    // An array of `NavigationItem` objects.
                ])->group('Ratings', [
                    // An array of `NavigationItem` objects.
                ])->group('Shield', array_merge(
                    RoleResource::getNavigationItems(),
                    UserResource::getNavigationItems(),
                ));
        });
    }
}
