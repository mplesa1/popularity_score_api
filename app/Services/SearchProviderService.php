<?php

namespace App\Services;

use App\Http\Resources\SearchProviderResource;
use App\Repositories\SearchProviderRepositoryInterface;
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
