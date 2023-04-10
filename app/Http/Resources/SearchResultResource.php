<?php

namespace App\Http\Resources;

use App\Models\SearchResult;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SearchResultResource
 *
 * @mixin SearchResult
 * */
class SearchResultResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'keyword' => $this->keyword,
            'count' => $this->count,
            'positive_count' => $this->positive_count,
            'negative_count' => $this->negative_count,
            'score' => $this->score,
            'search_provider_id' => $this->search_provider_id,
            'search_provider' => $this->searchProvider,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
