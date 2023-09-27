<?php

namespace App\Modules\Word\WordProviders;


abstract class WordProvider implements WordProviderInterface
{
    protected string $actionUrl;

    public function __construct(string $actionUrl)
    {
        $this->actionUrl = $actionUrl;
    }
}
