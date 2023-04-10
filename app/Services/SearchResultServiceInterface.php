<?php

namespace App\Services;

use App\Http\Requests\SearchResultRequest;
use App\Http\Resources\SearchResultResource;

interface SearchResultServiceInterface
{
    public function search(SearchResultRequest $request): SearchResultResource;
}
