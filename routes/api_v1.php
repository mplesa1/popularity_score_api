<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('search_providers')->group(function () {
    Route::get('/', [\App\Http\Controllers\V1\SearchProviderController::class, 'index']);
});

Route::prefix('search_results')->group(function () {
    Route::post('/', [\App\Http\Controllers\V1\SearchResultController::class, 'search']);
});
