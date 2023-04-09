<?php

namespace App\Http\Services;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface SearchProviderServiceInterface
{
    public function findAll():AnonymousResourceCollection;
}
