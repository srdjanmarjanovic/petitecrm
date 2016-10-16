<?php

namespace App\Providers;

use App\Managers\TagManager;
use App\Managers\CompanyManager;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('loggedIn', auth()->check());
        view()->share('user', auth()->user());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }


        $this->app->bind('TagManager', function() {
            return new TagManager;
        });

        $this->app->bind('CompanyManager', function() {
            return new CompanyManager;
        });
    }
}
