<?php

namespace App\Providers;

use App\Models\User;
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
        Gate::define('manage_users', function ($user) {
            return $user->is_admin;
        });

        Gate::define('add_user', function ($user) {
            return $user->is_admin;
        });
        Gate::define('edit_user', function ($user) {
            return $user->is_admin;
        });
        Gate::define('delete_user', function ($user) {
            return $user->is_admin;
        });
        Gate::define('access_translator', function ($user) {
            return $user->is_admin;
        });
        Gate::define('access_settings', function ($user) {
            return $user->is_admin;
        });
        Gate::define('access_dashboard', function ($user) {
            return $user->is_admin;
        });

    }
}
