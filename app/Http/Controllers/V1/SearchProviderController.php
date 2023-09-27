<?php

namespace App\Http\Controllers\V1;

use App\Modules\Word\Services\SearchProviderServiceInterface;

class SearchProviderController extends Controller
{
    public function __construct(
        private readonly SearchProviderServiceInterface $searchProviderService
    )
    {
    }

    /**
     *  Get all search providers.
     *
     * @return Illuminate\Support\Facades\Response
     */
    public function index()
    {
        return response()->success(
            trans('messages.search_providers_loaded'),
            $this->searchProviderService->findAll()
        );
    }
}
