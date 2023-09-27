<?php

namespace App\Modules\Word\WordProviders;

use App\Exceptions\GithubApiException;

interface WordProviderInterface
{
    /**
     * @throws GithubApiException
     */
    public function search(string $keyword): int;
}
