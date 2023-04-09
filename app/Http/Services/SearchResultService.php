<?php

namespace App\Http\Services;

use App\Enums\SearchProviderEnum;
use App\Exceptions\GithubApiException;
use App\Exceptions\NotImplementedException;
use App\Http\Repositories\SearchResultRepositoryInterface;
use App\Http\SearchProviders\Github;
use App\Http\V1\Requests\SearchResultRequest;
use App\Http\V1\Resources\SearchResultResource;
use App\Models\SearchResult;

final class SearchResultService implements SearchResultServiceInterface
{
    public function __construct(
        private readonly SearchResultRepositoryInterface $searchResultRepository
    )
    {
    }

    /**
     * @throws NotImplementedException
     * @throws GithubApiException
     */
    public function search(SearchResultRequest $request): SearchResultResource
    {
        $request->validated();
        $data = $request->all();
        $searchResult = $this->searchResultRepository->findByKeywordAndSearchProvider($data['keyword'], $data['search_provider_id']);
        if (is_null($searchResult)) {
            switch ($data['search_provider_id']) {
                case SearchProviderEnum::GITHUB->value:
                    $searchProvider = new Github(sprintf('%s%s', env('GITHUB_BASE_URL'), env('GITHUB_ACTION_URL')));
                    break;
                case SearchProviderEnum::TWITTER->value:
                    throw new NotImplementedException();
                default:
                    throw new NotImplementedException();
            }
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
