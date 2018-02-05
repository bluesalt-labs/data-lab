<?php

namespace App\Providers;

use App\User;
use App\Data;
use App\App;
use App\Policies\DataPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
        Gate::define('update-post', function ($user, $post) {
            return $user->id === $post->user_id;
        });
        */
        Gate::policy(Data::class, DataPolicy::class);
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->input('remember_token')) {
                return User::where('remember_token', $request->input('remember_token'))->first();
            }
            /*
            if ($request->input('api_token')) {
                return User::where('api_token', $request->input('api_token'))->first();
            }
            */
            /*
            if(
                $request->input('email') &&
                $request->input('password') &&
                $request->input('app_token')) {
                    return User::where('app_token', $request->input('api_token'))->first();
                }
            */
        });
    }
}
