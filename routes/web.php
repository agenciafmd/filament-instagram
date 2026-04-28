<?php

declare(strict_types=1);

namespace Agenciafmd\Instagram;

use Illuminate\Support\Facades\Route;
use JustBetter\InstagramFeed\Profile;

Route::get('instagram-auth-success', function () {
    return 'Sucesso ao linkar a conta!';
})
    ->name('admix.instagram.success');

Route::get('instagram-auth-failure', function () {
    return 'Falha ao linkar a conta!';
})
    ->name('admix.instagram.failure');

Route::get('instagram', function () {
    $route = Profile::query()
        ->first()
        ?->getInstagramAuthUrl() ?: '/admix';

    return redirect()->to($route);
})
    ->name('admix.instagram.redirect');
