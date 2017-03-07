<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        
        Gate::define('admin-access', function ($user) {
            foreach ($user->roles as $role) {
                if ($role->code == "admin") {
                    return true;
                }
            }
            return false;
        });

        Gate::define('author-access', function ($user) {
            foreach ($user->roles as $role) {
                if ($role->code == "author") {
                    return true;
                }
            }
            return false;
        });

    }
}
