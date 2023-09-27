<?php

namespace App\Modules\Word\Repositories\Postgres;

use App\Modules\Word\Models\WordResult;
use App\Modules\Word\Repositories\WordResultRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

final class WordResultRepository implements WordResultRepositoryInterface
{
    public function __construct()
    {
    }

    public function findByKeywordAndSearchProvider(string $keyword, int $wordProviderId): WordResult|Model|null
    {
        return WordResult::query()
            ->where('keyword', $keyword)
            ->where('word_provider_id', $wordProviderId)
            ->first();
    }
}
