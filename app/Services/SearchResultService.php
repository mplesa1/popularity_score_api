<?php

namespace App\Services;

use App\Exceptions\GithubApiException;
use App\Exceptions\NotImplementedException;
use App\Http\Requests\SearchResultRequest;
use App\Http\Resources\SearchResultResource;
use App\Models\SearchResult;
use App\Repositories\SearchResultRepositoryInterface;
use App\Services\SearchProviders\SearchProviderFactory;

final readonly class SearchResultService implements SearchResultServiceInterface
{
    public function __construct(
        private SearchResultRepositoryInterface $searchResultRepository
    )
    {
    }

    /**
     * @throws NotImplementedException|GithubApiException
     */
    public function search(SearchResultRequest $request): SearchResultResource
    {
        $request->validated();
        $data = $request->all();
        $searchResult = $this->searchResultRepository->findByKeywordAndSearchProvider($data['keyword'], $data['search_provider_id']);
        if (is_null($searchResult)) {
            $searchProvider = SearchProviderFactory::createProvider($data['search_provider_id']);
            $searchResult = new SearchResult();
            $searchResult->search_provider_id = $data['search_provider_id'];
            $searchResult->keyword = $data['keyword'];
            $searchResult->count = $searchProvider->search($data['keyword']);
            $searchResult->positive_count = $searchProvider->search($data['keyword'] . ' rocks');
            $searchResult->negative_count = $searchProvider->search($data['keyword'] . ' sucks');
            $searchResult->score = ($searchResult->positive_count / $searchResult->count) * 10;
            $searchResult->save();
        }

        return new SearchResultResource($searchResult);
    }
}
