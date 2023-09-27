<?php

namespace App\Modules\Word\Services;

use App\Exceptions\GithubApiException;
use App\Exceptions\NotImplementedException;
use App\Models\Word;
use App\Modules\Word\Repositories\WordResultRepositoryInterface;
use App\Modules\Word\Requests\SearchResultRequest;
use App\Modules\Word\Resources\SearchResultResource;
use App\Modules\Word\WordProviders\WordProviderFactory;

final readonly class SearchResultService implements SearchResultServiceInterface
{
    public function __construct(
        private WordResultRepositoryInterface $searchResultRepository
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
        $searchResult = $this->searchResultRepository->findByKeywordAndSearchProvider($data['keyword'], $data['word_provider_id']);
        if (is_null($searchResult)) {
            $searchProvider = WordProviderFactory::createProvider($data['word_provider_id']);
            $searchResult = new Word();
            $searchResult->word_provider_id = $data['word_provider_id'];
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
