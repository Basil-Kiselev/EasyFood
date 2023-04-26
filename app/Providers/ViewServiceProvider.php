<?php

namespace App\Providers;

use App\View\Composers\CategoriesComposer;
use App\View\Composers\ContactsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['blocks.header.info', 'blocks.footer'], ContactsComposer::class);
        View::composer(['home', 'search'], CategoriesComposer::class);
    }
}
