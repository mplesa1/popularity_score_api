<?php

namespace App\Services\SearchProviders;


abstract class SearchProvider implements SearchProviderInterface
{
    protected string $searchActionUrl;

    public function __construct(string $searchActionUrl)
    {
        $this->searchActionUrl = $searchActionUrl;
    }
}
