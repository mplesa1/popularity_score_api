<?php

namespace App\Modules\Word\Services;

use App\Exceptions\GithubApiException;
use App\Exceptions\NotImplementedException;
use App\Modules\Word\Models\WordResult;
use App\Modules\Word\Repositories\WordResultRepositoryInterface;
use App\Modules\Word\WordProviders\WordProviderFactory;

final readonly class WordResultService implements WordResultServiceInterface
{
    public function __construct(
        private WordResultRepositoryInterface $wordResultRepository
    )
    {
    }

    /**
     * @throws NotImplementedException|GithubApiException
     */
    public function search(string $keyword, int $wordProviderId): WordResult
    {
        $wordResult = $this->wordResultRepository->findByKeywordAndSearchProvider($keyword, $wordProviderId);
        if (is_null($wordResult)) {
            $searchProvider = WordProviderFactory::createProvider($wordProviderId);
            $wordResult = new WordResult();
            $wordResult->word_provider_id = $wordProviderId;
            $wordResult->keyword = $keyword;
            $wordResult->positive_count = $searchProvider->search($keyword .  self::POSITIVE_RESULTS_SUFFIX);
            $wordResult->negative_count = $searchProvider->search($keyword .  self::NEGATIVE_RESULTS_SUFFIX);
            $wordResult->score = ($wordResult->positive_count / $wordResult->negative_count) * 10;
            $wordResult->save();
        }
        return $wordResult;
    }
}
