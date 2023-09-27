<?php

namespace App\Modules\Word\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface WordProviderRepositoryInterface
{
    public function findAll():Collection;
}
