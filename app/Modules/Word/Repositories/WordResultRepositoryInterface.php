<?php

namespace App\Modules\Word\Repositories;

use App\Modules\Word\Models\WordResult;
use Illuminate\Database\Eloquent\Model;

interface WordResultRepositoryInterface
{
    public function findByKeywordAndSearchProvider(string $keyword, int $wordProviderId):WordResult|Model|null;
}
