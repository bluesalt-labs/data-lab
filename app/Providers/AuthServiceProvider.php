<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\User;
use App\Models\App;
use App\Models\Data;
use App\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->registerMiscPolicies();
        $this->registerAppPolicies();
        $this->registerDataPolicies();
        $this->registerUserPolicies();
        $this->registerRolePolicies();

        Passport::routes();
    }

    public function registerMiscPolicies() {
        Gate::define('dashboard', function (User $user) {
            return $user->hasAccess(['dashboard']);
        });
    }

    public function registerUserPolicies() {
        Gate::define('user-create', function (User $user) {
            return $user->hasAccess(['user-create']);
        });
        Gate::define('user-read', function (User $user) {
            return $user->hasAccess(['user-read']);
        });
        Gate::define('user-update', function (User $user) {
            return $user->hasAccess(['user-update']);
        });
        Gate::define('user-delete', function (User $user) {
            return $user->hasAccess(['user-delete']);
        });
    }

    public function registerRolePolicies() {
        Gate::define('role-create', function (User $user) {
            return $user->hasAccess(['role-create']);
        });
        Gate::define('role-read', function (User $user) {
            return $user->hasAccess(['role-read']);
        });
        Gate::define('role-update', function (User $user) {
            return $user->hasAccess(['role-update']);
        });
        Gate::define('role-delete', function (User $user) {
            return $user->hasAccess(['role-delete']);
        });
    }

    public function registerAppPolicies() {
        Gate::define('app-create', function (User $user) {
            return $user->hasAccess(['app-create']);
        });
        Gate::define('app-read', function (User $user) {
            return  $user->hasAccess(['app-read']);
        });
        Gate::define('app-update', function (User $user) {
            return $user->hasAccess(['app-update']);
        });
        Gate::define('app-delete', function (User $user) {
            return $user->hasAccess(['app-delete']);
        });
    }

    public function registerDataPolicies() {
        Gate::define('data-create', function (User $user) {
            return $user->hasAccess(['data-create']);
        });
        Gate::define('data-read', function (User $user) {
            return $user->hasAccess(['data-read']);
        });
        Gate::define('data-update', function (User $user) {
            return $user->hasAccess(['data-update']);
        });
        Gate::define('data-delete', function (User $user) {
            return $user->hasAccess(['data-delete']);
        });
    }
}
