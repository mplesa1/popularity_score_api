<?php

namespace App\Http\SearchProviders;


use App\Enums\SearchProviderEnum;
use App\Exceptions\NotImplementedException;

abstract class SearchProviderCore implements SearchProviderCoreInterface
{
    protected string $searchActionUrl;

    public function __construct(string $searchActionUrl)
    {
        $this->searchActionUrl = $searchActionUrl;
    }

    /**
     * @throws NotImplementedException
     */
    public static function createProvider(int $searchProviderId): SearchProviderCoreInterface{
        switch ($searchProviderId) {
            case SearchProviderEnum::GITHUB->value:
                $searchProvider = new Github(sprintf('%s%s', env('GITHUB_BASE_URL'), env('GITHUB_ACTION_URL')));
                break;
            case SearchProviderEnum::TWITTER->value:
                throw new NotImplementedException();
            default:
                throw new NotImplementedException();
        }

        return $searchProvider;
    }
}
