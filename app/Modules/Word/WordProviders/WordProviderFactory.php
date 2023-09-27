<?php

namespace App\Modules\Word\WordProviders;


use App\Exceptions\NotImplementedException;
use App\Modules\Word\Enums\WordProviderEnum;

final class WordProviderFactory
{
    /**
     * @throws NotImplementedException
     */
    public static function createProvider(int $wordProviderId): WordProviderInterface{
        $wordProviderEnum = WordProviderEnum::from($wordProviderId);
        switch ($wordProviderEnum) {
            case WordProviderEnum::GITHUB:
                $wordProvider = new Github(sprintf('%s%s', env('GITHUB_BASE_URL'), env('GITHUB_ACTION_URL')));
                break;
            case WordProviderEnum::TWITTER:
                throw new NotImplementedException();
            default:
                throw new NotImplementedException();
        }

        return $wordProvider;
    }
}
