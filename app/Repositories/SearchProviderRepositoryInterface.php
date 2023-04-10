<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface SearchProviderRepositoryInterface
{
    public function findAll():Collection;
}
