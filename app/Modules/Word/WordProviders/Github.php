<?php

namespace App\Modules\Word\WordProviders;


use App\Exceptions\GithubApiException;
use Illuminate\Support\Facades\Http;

final class Github extends WordProvider
{
    /**
     * @throws GithubApiException
     */
    public function search(string $keyword): int
    {
        $response = Http::get($this->actionUrl . $keyword);

        if (!$response->successful()){
            throw  new GithubApiException();
        }

        return $response->object()->total_count;
    }
}
