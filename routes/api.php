<?php

use App\Modules\Word\JsonApi\V1\WordResultController;
use Illuminate\Contracts\Routing\Registrar;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;
use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;
use LaravelJsonApi\Laravel\Routing\ResourceRegistrar as LaravelJsonApiResourceRegistrar;

/** @var Registrar $router */


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

JsonApiRoute::server('v1')
    ->prefix('v1')
    ->resources(function (LaravelJsonApiResourceRegistrar $server): void {
        $server->resource('wordProviders', JsonApiController::class);
        $server->resource('products', JsonApiController::class);
        $server->resource('productVariants', JsonApiController::class);
    });

$router->get('v1/word-results/search', WordResultController::class);
