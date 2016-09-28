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
    	// --------------------------------------
    	// Filters
    	// --------------------------------------
        view()->composer(['companies.index', 'contacts.index'], 'App\Http\ViewComposers\TagSidebarFilter');
        view()->composer('contacts.index', 'App\Http\ViewComposers\CompanySidebarFilter');
        view()->composer('companies.index', 'App\Http\ViewComposers\IndustrySidebarFilter');
        
        // --------------------------------------
        // "All" entities
        // --------------------------------------
        view()->composer(['companies.create', 'companies.edit', 'contacts.edit', 'contacts.create'], 'App\Http\ViewComposers\AllTags');
        view()->composer(['contacts.edit', 'contacts.create'], 'App\Http\ViewComposers\AllCompanies');
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