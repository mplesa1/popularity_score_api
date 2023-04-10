<?php

namespace App\Repositories;

use App\Models\SearchResult;
use Illuminate\Database\Eloquent\Model;

interface SearchResultRepositoryInterface
{
    public function findByKeywordAndSearchProvider(string $keyword, int $searchProviderId):SearchResult|Model|null;
}
