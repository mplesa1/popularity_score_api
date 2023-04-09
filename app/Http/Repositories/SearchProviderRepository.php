<?php

namespace App\Http\Repositories;

use App\Models\SearchProvider;
use Illuminate\Database\Eloquent\Collection;

final class SearchProviderRepository implements SearchProviderRepositoryInterface
{
    public function __construct()
    {
    }

    public function findAll(): Collection
    {
        return SearchProvider::query()->get();
    }
}
