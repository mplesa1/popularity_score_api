<?php

namespace App\Http\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

interface SearchProviderRepositoryInterface
{
    public function findAll():Collection;
}
