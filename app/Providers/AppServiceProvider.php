<?php

namespace App\Providers;

use App\Contracts\RegistrationContract;
use App\School;
use App\Services\Login;
use App\Services\Registration;
use App\User;
use Illuminate\Support\ServiceProvider;
use App\Contracts\LoginContract;

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
        $this->app->bind(LoginContract::class, function(){
            return new Login();
        });

        $this->app->bind(RegistrationContract::class, function(){
            return new Registration(
                new User(),
                new School()
            );
        });
    }
}
