<?php

namespace App\Services;

use App\Http\V1\Requests\SearchResultRequest;
use App\Http\V1\Resources\SearchResultResource;

interface SearchResultServiceInterface
{
    public function search(SearchResultRequest $request): SearchResultResource;
}
