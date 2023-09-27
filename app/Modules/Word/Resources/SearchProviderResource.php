<?php

namespace App\Modules\Word\Resources;

use App\Models\WordProvider;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SearchResultResource
 *
 * @mixin WordProvider
 * */
class SearchProviderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
