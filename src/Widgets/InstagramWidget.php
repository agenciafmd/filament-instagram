<?php

declare(strict_types=1);

namespace Agenciafmd\Instagram\Widgets;

use Filament\Widgets\Widget;
use Override;

final class InstagramWidget extends Widget
{
    #[Override]
    protected string $view = 'instagram::widgets.instagram-widget';
}
