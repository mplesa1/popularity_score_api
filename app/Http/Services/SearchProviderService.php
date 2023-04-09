<?php

namespace App\Http\Services;

use App\Http\Repositories\SearchProviderRepositoryInterface;
use App\Http\V1\Resources\SearchProviderResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class SearchProviderService implements SearchProviderServiceInterface
{
    public function __construct(
        private readonly SearchProviderRepositoryInterface $searchProviderRepository
    )
    {
    }


    public function findAll(): AnonymousResourceCollection
    {
        return SearchProviderResource::collection($this->searchProviderRepository->findAll());
    }
}
