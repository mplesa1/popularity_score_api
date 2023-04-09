<?php

namespace App\Http\SearchProviders;


abstract class SearchProviderCore
{
    protected string $searchActionUrl;

    public function __construct(string $searchActionUrl)
    {
        $this->searchActionUrl = $searchActionUrl;
    }

    abstract public function search(string $keyword): int;
}
