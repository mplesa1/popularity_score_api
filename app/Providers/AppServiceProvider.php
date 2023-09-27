<?php

namespace App\Providers;

use App\Modules\Word\Repositories\Postgres\WordProviderRepository;
use App\Modules\Word\Repositories\Postgres\WordResultRepository;
use App\Modules\Word\Repositories\WordProviderRepositoryInterface;
use App\Modules\Word\Repositories\WordResultRepositoryInterface;
use App\Modules\Word\Services\SearchProviderService;
use App\Modules\Word\Services\SearchProviderServiceInterface;
use App\Modules\Word\Services\SearchResultService;
use App\Modules\Word\Services\SearchResultServiceInterface;
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
        //
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
