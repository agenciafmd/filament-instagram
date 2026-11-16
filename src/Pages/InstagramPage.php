<?php

declare(strict_types=1);

namespace Agenciafmd\Instagram\Pages;

use BackedEnum;
use Filament\Facades\Filament;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Override;

final class InstagramPage extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'tabler-brand-instagram';

    protected static ?int $navigationSort = null;

    protected static ?string $slug = 'instagram';

    protected string $view = 'instagram::pages.instagram-page';

    #[Override]
    public static function getNavigationGroup(): ?string
    {
        $navigationGroup = config('filament-instagram.navigation_group');

        return is_string($navigationGroup) ? $navigationGroup : null;
    }

    #[Override]
    public static function getNavigationSort(): ?int
    {
        $navigationSort = config('filament-instagram.navigation_sort');

        return is_int($navigationSort) ? $navigationSort : null;
    }

    #[Override]
    public static function getNavigationLabel(): string
    {
        return 'Instagram';
    }

    #[Override]
    public function getTitle(): string|Htmlable
    {
        return 'Instagram';
    }

    #[Override]
    public static function canAccess(): bool
    {
        return Filament::auth()->user()?->isAdmin() === true;
    }
}
