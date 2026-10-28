<?php

namespace App\Providers;

use App\Repositories\ServiceRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register application bindings here when needed.
    }

    public function boot(): void
    {
        // Both shared templates need the service list for their navigation links.
        // A view composer keeps data-fetching logic out of the Blade templates.
        View::composer(['partials.navbar', 'partials.footer'], function ($view): void {
            $view->with('navigationServices', app(ServiceRepository::class)->all());
        });
    }
}
