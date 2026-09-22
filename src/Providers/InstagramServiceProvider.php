<?php

declare(strict_types=1);

namespace Agenciafmd\Instagram\Providers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

final class InstagramServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->bootProviders();

        $this->bootMigrations();

        $this->bootTranslations();

        $this->bootViews();

        $this->callAfterResolving(Schedule::class, function (Schedule $schedule) {
            $schedule->command('instagram-feed:refresh')
                ->hourly();

            $schedule->command('instagram-feed:refresh-tokens')
                ->weekly();
        });
    }

    public function register(): void
    {
        $this->registerConfigs();
    }

    private function bootProviders(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }

    private function bootMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }

    private function bootTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'filament-instagram');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../lang');
    }

    private function registerConfigs(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/filament-instagram.php', 'filament-instagram');
        $this->mergeConfigFrom(__DIR__ . '/../../config/instagram-feed.php', 'instagram-feed');
    }

    private function bootViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'instagram');
    }
}
