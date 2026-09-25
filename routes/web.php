<?php

declare(strict_types=1);

namespace Agenciafmd\Instagram;

use Illuminate\Support\Facades\Route;
use JustBetter\InstagramFeed\Profile;

Route::get('instagram-auth-success', static function (): string {
    return 'Sucesso ao linkar a conta!'; // TODO, alimentar o sweetalert e redirecionar
})
    ->name('admix.instagram.success');

Route::get('instagram-auth-failure', static function (): string {
    return 'Falha ao linkar a conta!'; // TODO, alimentar o sweetalert e redirecionar
})
    ->name('admix.instagram.failure');

Route::get('instagram', static function () {
    $route = Profile::query()
        ->first()
        ?->getInstagramAuthUrl() ?: '/admix';

    return redirect()->to($route);
})
    ->name('admix.instagram.redirect');
