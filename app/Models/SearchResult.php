<?php

namespace App\Models;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property int $id
 * @property string $keyword
 * @property int $count
 * @property int $positive_count
 * @property int $negative_count
 * @property int $search_provider_id
 * @property float $score
 * @property SearchProvider $searchProvider
 * @property CarbonImmutable|null $created_at
 * @property CarbonImmutable|null $updated_at
 */
class SearchResult extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'keyword', 'count', 'positive_count', 'negative_count', 'search_provider_id'
    ];
}
