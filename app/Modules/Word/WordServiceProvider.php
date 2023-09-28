<?php

namespace App\Modules\Word;

use App\Modules\Word\Repositories\Postgres\WordProviderRepository;
use App\Modules\Word\Repositories\Postgres\WordResultRepository;
use App\Modules\Word\Repositories\WordProviderRepositoryInterface;
use App\Modules\Word\Repositories\WordResultRepositoryInterface;
use App\Modules\Word\Services\SearchProviderService;
use App\Modules\Word\Services\SearchProviderServiceInterface;
use App\Modules\Word\Services\WordResultService;
use App\Modules\Word\Services\WordResultServiceInterface;
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
        $this->app->bind(WordResultServiceInterface::class, WordResultService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }
}
