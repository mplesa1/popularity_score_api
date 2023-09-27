<?php

namespace App\Modules\Word\Models;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $keyword
 * @property int $count
 * @property int $positive_count
 * @property int $negative_count
 * @property int $word_provider_id
 * @property float $score
 * @property WordProvider $wordProvider
 * @property CarbonImmutable|null $created_at
 * @property CarbonImmutable|null $updated_at
 */
class WordResult extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'keyword', 'count', 'positive_count', 'negative_count', 'word_provider_id'
    ];

    public function wordProvider(): BelongsTo
    {
        return $this->belongsTo(WordProvider::class);
    }
}
