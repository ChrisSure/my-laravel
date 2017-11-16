<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Laravel\Dusk\DuskServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        DB::listen(function ($query) {
             //echo $query->sql  . ' ---- ';
             //$query->bindings
             //$query->time
        });
        
        if ($this->app->environment('local', 'testing')) {
	        $this->app->register(DuskServiceProvider::class);
	    }
        
    }
}
