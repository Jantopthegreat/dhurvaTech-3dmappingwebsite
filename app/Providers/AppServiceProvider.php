<?php

namespace App\Providers;

use App\Repositories\ServiceRepository;
use App\Models\Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
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
        View::composer(['partials.navbar', 'partials.footer', 'partials.whatsapp-button'], function ($view): void {
            $view->with('navigationServices', app(ServiceRepository::class)->all());
            $contact = Cache::remember('site_contact', 3600, function (): array {
                $row = Contact::latest('id')->first();

                return array_merge(config('jst.contact'), array_filter([
                    'email' => $row?->email,
                    'whatsapp' => $row?->no_hp,
                    'address' => $row?->alamat,
                ]));
            });

            $view->with('contact', $contact);
        });
    }
}
