<?php

namespace App\Providers;

use App\Repositories\SearchProviderRepository;
use App\Repositories\SearchProviderRepositoryInterface;
use App\Repositories\SearchResultRepository;
use App\Repositories\SearchResultRepositoryInterface;
use App\Services\SearchProviderService;
use App\Services\SearchProviderServiceInterface;
use App\Services\SearchResultService;
use App\Services\SearchResultServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Repositories
        $this->app->bind(SearchProviderRepositoryInterface::class, SearchProviderRepository::class);
        $this->app->bind(SearchResultRepositoryInterface::class, SearchResultRepository::class);

        // Services
        $this->app->bind(SearchResultServiceInterface::class, SearchResultService::class);
        $this->app->bind(SearchProviderServiceInterface::class, SearchProviderService::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
