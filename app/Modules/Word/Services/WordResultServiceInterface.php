<?php

namespace App\Modules\Word\Services;

use App\Modules\Word\Models\WordResult;

interface WordResultServiceInterface
{
    public const POSITIVE_RESULTS_SUFFIX = 'rocks';
    public const NEGATIVE_RESULTS_SUFFIX = 'sucks';
    public function search(string $keyword, int $wordProviderId): WordResult;
}
