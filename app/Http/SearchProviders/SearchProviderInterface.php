<?php

namespace App\Http\SearchProviders;

use App\Exceptions\GithubApiException;

interface SearchProviderInterface
{
    /**
     * @throws GithubApiException
     */
    public function search(string $keyword): int;
}
