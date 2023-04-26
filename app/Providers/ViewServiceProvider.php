<?php

namespace App\Providers;

use App\View\Composers\HeaderComposer;
use App\View\Composers\HeroComposer;
use App\View\Composers\FooterComposer;
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
        View::composer('blocks.footer', FooterComposer::class);
        View::composer('blocks.hero', HeroComposer::class);
        View::composer('blocks.header', HeaderComposer::class);
    }
}
