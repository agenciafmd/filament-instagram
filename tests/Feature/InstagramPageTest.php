<?php

declare(strict_types=1);

namespace Agenciafmd\Instagram\Tests\Feature;

use Agenciafmd\Admix\Database\Factories\RoleFactory;
use Agenciafmd\Admix\Database\Factories\UserFactory;
use Agenciafmd\Instagram\Pages\InstagramPage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

pest()->extend(TestCase::class)->use(RefreshDatabase::class);

it('lets administrators open the instagram page and renew the token', function (): void {
    actingAs(UserFactory::new()->create()->fresh(), 'admix-web');

    get(InstagramPage::getUrl())
        ->assertOk()
        ->assertSee(route('admix.instagram.redirect'));
});

it('forbids users from a restricted role', function (): void {
    $role = RoleFactory::new()->withPermissions([])->create();

    actingAs(UserFactory::new()->create(['role_id' => $role->getKey()])->fresh(), 'admix-web');

    get(InstagramPage::getUrl())->assertForbidden();
});

it('reads the navigation group from the config', function (): void {
    config()->set('filament-instagram.navigation_group', 'Configurações');

    expect(InstagramPage::getNavigationGroup())->toBe('Configurações');
});
