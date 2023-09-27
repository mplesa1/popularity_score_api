<?php

namespace App\Modules\Word\Services;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface SearchProviderServiceInterface
{
    public function findAll():AnonymousResourceCollection;
}
