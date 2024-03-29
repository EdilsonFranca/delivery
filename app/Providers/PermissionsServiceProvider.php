<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(){
        Blade::directive('role', function ($role){
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})) :";
           });
           Blade::directive('endrole', function ($role){
            return "<?php endif; ?>";
           });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(){
     Permission::get()->map(function($permission){
         Gate::define($permission->slug, function($user) use ($permission){
       return $user->hasPermissionTo($permission);
    });
  });
 }
}
