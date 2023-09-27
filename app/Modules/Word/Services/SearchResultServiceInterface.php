<?php

namespace App\Modules\Word\Services;

use App\Modules\Word\Requests\SearchResultRequest;
use App\Modules\Word\Resources\SearchResultResource;

interface SearchResultServiceInterface
{
    public function search(SearchResultRequest $request): SearchResultResource;
}
