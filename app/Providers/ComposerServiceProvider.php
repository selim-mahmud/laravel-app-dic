<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            '_partials.breadcrumb', 'App\Http\ViewComposers\BreadCrumbComposer'
        );

        View::composer(
            '_partials.breadcrumb_control', 'App\Http\ViewComposers\BreadCrumbControlComposer'
        );

        View::composer(
            '_partials.post_categories', 'App\Http\ViewComposers\PostCategoriesComposer'
        );

        View::composer(
            '_partials.state_links', 'App\Http\ViewComposers\StateLinksComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
