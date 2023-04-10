<?php

namespace App\Services\SearchProviders;


use App\Enums\SearchProviderEnum;
use App\Exceptions\NotImplementedException;

final class SearchProviderFactory
{
    /**
     * @throws NotImplementedException
     */
    public static function createProvider(int $searchProviderId): SearchProviderInterface{
        $searchProviderEnum = SearchProviderEnum::from($searchProviderId);
        switch ($searchProviderEnum) {
            case SearchProviderEnum::GITHUB:
                $searchProvider = new Github(sprintf('%s%s', env('GITHUB_BASE_URL'), env('GITHUB_ACTION_URL')));
                break;
            case SearchProviderEnum::TWITTER:
                throw new NotImplementedException();
            default:
                throw new NotImplementedException();
        }

        return $searchProvider;
    }
}
