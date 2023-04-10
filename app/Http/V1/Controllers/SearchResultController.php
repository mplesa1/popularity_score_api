<?php

namespace App\Http\V1\Controllers;

use App\Http\V1\Requests\SearchResultRequest;
use App\Services\SearchResultServiceInterface;

class SearchResultController extends Controller
{
    public function __construct(
        private readonly SearchResultServiceInterface $searchResultService
    )
    {
    }

    /**
     *  Get search result by keyword.
     *
     * @return Illuminate\Support\Facades\Response
     */
    public function search(SearchResultRequest $request)
    {
        return response()->success(
            trans('messages.search_result_loaded'),
            $this->searchResultService->search($request)
        );
    }
}
