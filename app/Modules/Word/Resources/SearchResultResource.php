<?php

namespace App\Modules\Word\Resources;

use App\Models\Word;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SearchResultResource
 *
 * @mixin Word
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
            'word_provider_id' => $this->word_provider_id,
            'search_provider' => $this->searchProvider,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
