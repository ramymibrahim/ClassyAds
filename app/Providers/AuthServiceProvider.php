<?php

namespace App\Providers;

use App\Item;
use App\Policies\ItemPolicy;
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
        
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            if ($user->type == 'admin')
                return true;
        });

        Gate::define('admin', function ($user) {
            return $user->type == 'admin';
        });

        Gate::define('manage', function ($user) {
            return ($user->type == 'manager');
        });

        Gate::define('subManage', function ($user) {
            return ($user->type == 'manager' || $user->type == 'subManager');
        });
        //
    }
}
