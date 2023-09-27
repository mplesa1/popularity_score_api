<?php

namespace App\Modules\Word\Repositories\Postgres;

use App\Modules\Word\Repositories\WordProviderRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

final class WordProviderRepository implements WordProviderRepositoryInterface
{
    public function __construct()
    {
    }

    public function findAll(): Collection
    {
        return WordProvider::query()->get();
    }
}
