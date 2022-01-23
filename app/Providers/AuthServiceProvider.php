<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('create', function(User $user){
            return $user->hasPermission('CREATE');
        });

        Gate::define('update', function (User $user) {
            return $user->hasPermission('UPDATE');
        });

        Gate::define('delete', function(User $user){
            return $user->hasPermission('DELETE');
        });

        Gate::define('change-permissions', function(User $user){
            return $user->hasPermission('CHANGE_PERMISSIONS');
        });

        Gate::define('SeeReport', function(User $user){
            return $user->hasPermission('MANAGE_REPORTS');
        });

        Gate::define('SeeManagment', function(User $user){
            return $user->hasPermission('SEE_MANAGMENT');
        }); 

        Gate::define('sms', function(User $user){
            return $user->hasPermission('SEND_SMS');
        }); 
        
        Gate::define('SeeSelling', function(User $user){
            return $user->hasPermission('SEE_SELLING');
        });

        Gate::define('seeDashboard', function(User $user){
            return $user->hasPermission('SEE_DASHBOARD');
        });

        Gate::define('basic-access', function(User $user){
            return $user->hasPermission('BASIC_ACCESS');
        });
    }
}
