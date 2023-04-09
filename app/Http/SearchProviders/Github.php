<?php

namespace App\Http\SearchProviders;


use App\Exceptions\GithubApiException;
use Illuminate\Support\Facades\Http;

final class Github extends SearchProviderCore
{
    /**
     * @throws GithubApiException
     */
    public function search(string $keyword): int
    {
        $response = Http::get($this->searchActionUrl . $keyword);

        if (!$response->successful()){
            throw  new GithubApiException();
        }

        return $response->object()->total_count;
    }
}
