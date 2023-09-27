<?php

declare(strict_types=1);

namespace App\Modules\Word\Enums;

enum WordProviderEnum: int
{
    case GITHUB = 1;
    case TWITTER = 2;
}
