<?php

namespace Ykocaman\LdapAuth;

use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\ServiceProvider;
use Auth;
use App\User;

class LdapAuthServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/../config/ldapauth.php' => config_path('ldapauth.php')
        ], 'config');

        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations')
        ], 'migrations');

    }

    /**
     * Register any package services.
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ldapauth.connection', function ($app) {
            return new Manager($app);
        });

        Auth::provider('ldap', function ($app) {
            return new LdapAuthUserProvider(app(Hasher::class), User::class, app('ldapauth.connection'));
        });
    }
}