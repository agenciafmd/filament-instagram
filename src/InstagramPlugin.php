<?php

declare(strict_types=1);

namespace Agenciafmd\Instagram;

use Agenciafmd\Instagram\Pages\InstagramPage;
use Filament\Contracts\Plugin;
use Filament\Panel;

final class InstagramPlugin implements Plugin
{
    public static function make(): static
    {
        return resolve(self::class);
    }

    public function getId(): string
    {
        return 'instagram';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->pages([
                InstagramPage::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
