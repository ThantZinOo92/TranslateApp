<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Translation\TranslationServiceInterface;
use App\Services\Translation\GoogleTranslationService;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TranslationServiceInterface::Class,GoogleTranslationService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
