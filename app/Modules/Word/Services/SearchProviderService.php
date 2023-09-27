<?php

namespace App\Modules\Word\Services;

use App\Modules\Word\Repositories\WordProviderRepositoryInterface;
use App\Modules\Word\Resources\SearchProviderResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final readonly class SearchProviderService implements SearchProviderServiceInterface
{
    public function __construct(
        private WordProviderRepositoryInterface $searchProviderRepository
    )
    {
    }


    public function findAll(): AnonymousResourceCollection
    {
        return SearchProviderResource::collection($this->searchProviderRepository->findAll());
    }
}
