<?php

namespace App\Http\Controllers\V2;

use App\Modules\Word\Requests\SearchResultRequest;
use App\Modules\Word\Services\SearchResultServiceInterface;

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
