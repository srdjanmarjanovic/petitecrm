<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['companies.index', 'contacts.index'], 'App\Http\ViewComposers\TagSidebarFilter');
        
        view()->composer(['companies.create', 'companies.edit', 'contacts.edit', 'contacts.create'], 'App\Http\ViewComposers\AllTags');

        view()->composer(['contacts.edit', 'contacts.create'], 'App\Http\ViewComposers\AllCompanies');

        view()->composer('contacts.index', 'App\Http\ViewComposers\CompanySidebarFilter');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}