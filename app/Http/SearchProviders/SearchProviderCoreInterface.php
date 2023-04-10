<?php

namespace App\Http\SearchProviders;

use App\Exceptions\GithubApiException;

interface SearchProviderCoreInterface
{
    /**
     * @throws GithubApiException
     */
    public function search(string $keyword): int;
}
