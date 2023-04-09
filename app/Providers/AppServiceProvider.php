<?php

namespace App\Providers;

use App\Http\Repositories\SearchProviderRepository;
use App\Http\Repositories\SearchProviderRepositoryInterface;
use App\Http\Repositories\SearchResultRepository;
use App\Http\Repositories\SearchResultRepositoryInterface;
use App\Http\Services\SearchProviderService;
use App\Http\Services\SearchProviderServiceInterface;
use App\Http\Services\SearchResultService;
use App\Http\Services\SearchResultServiceInterface;
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
