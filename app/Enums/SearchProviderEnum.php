<?php

declare(strict_types=1);

namespace App\Enums;

enum SearchProviderEnum: int
{
    case GITHUB = 1;
    case TWITTER = 2;
}
