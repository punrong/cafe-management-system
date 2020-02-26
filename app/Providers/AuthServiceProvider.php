<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-team', function($user){
            return $user->hasAnyRoles(['admin','assistance']);
        });

        Gate::define('manage-users', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('edit-users', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });



        Gate::define('manage-drinks', function($user){
            return $user->hasAnyRoles(['admin','assistance']);
        });

        Gate::define('edit-drinks', function($user){
            return $user->hasAnyRoles(['admin','assistance']);
        });

        Gate::define('delete-drinks', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('approve-drinks', function($user){
            return $user->hasRole('admin');
        });


        Gate::define('manage-promotions', function($user){
            return $user->hasAnyRoles(['admin','assistance']);
        });

        Gate::define('edit-promotions', function($user){
            return $user->hasAnyRoles(['admin','assistance']);
        });

        Gate::define('delete-promotions', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('approve-promotions', function($user){
            return $user->hasRole('admin');
        });

    }
}
