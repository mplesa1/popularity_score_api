<?php

namespace App\Modules\Articles;

use App\Modules\Word\Repositories\Postgres\WordProviderRepository;
use App\Modules\Word\Repositories\Postgres\WordResultRepository;
use App\Modules\Word\Repositories\WordProviderRepositoryInterface;
use App\Modules\Word\Repositories\WordResultRepositoryInterface;
use App\Modules\Word\Services\SearchProviderService;
use App\Modules\Word\Services\SearchProviderServiceInterface;
use App\Modules\Word\Services\SearchResultService;
use App\Modules\Word\Services\SearchResultServiceInterface;
use Illuminate\Support\ServiceProvider;

class WordServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Repositories
        $this->app->bind(WordProviderRepositoryInterface::class, WordProviderRepository::class);
        $this->app->bind(WordResultRepositoryInterface::class, WordResultRepository::class);

        // Services
        $this->app->bind(SearchResultServiceInterface::class, SearchResultService::class);
        $this->app->bind(SearchProviderServiceInterface::class, SearchProviderService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
