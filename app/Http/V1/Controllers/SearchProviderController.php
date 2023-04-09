<?php

namespace App\Http\V1\Controllers;

use App\Http\Services\SearchProviderServiceInterface;

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
            trans('messages.search_providers'),
            $this->searchProviderService->findAll()
        );
    }
}
