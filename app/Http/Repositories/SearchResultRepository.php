<?php

namespace App\Http\Repositories;

use App\Models\SearchProvider;
use App\Models\SearchResult;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class SearchResultRepository implements SearchResultRepositoryInterface
{
    public function __construct()
    {
    }

    public function findByKeywordAndSearchProvider(string $keyword, int $searchProviderId): SearchResult|Model|null
    {
        return SearchResult::query()
            ->where('keyword', $keyword)
            ->where('search_provider_id', $searchProviderId)
            ->first();
    }
}
