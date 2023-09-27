<?php

declare(strict_types=1);

namespace App\Modules\Word\JsonApi\V1;

use App\Modules\Word\Models\WordResult;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Number;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

final class WordResultSchema extends Schema
{
    /**
     * The model the schema corresponds to.
     *
     */
    public static string $model = WordResult::class;

    public static function type(): string
    {
        return 'wordResults';
    }

    /**
     * Get the resource fields.
     *
     */
    public function fields(): array
    {
        return [
            ID::make(),
            BelongsTo::make('wordProvider')->type('wordProviders'),
            Number::make('count'),
            Number::make('positive_count'),
            Number::make('negative_count'),
            Number::make('score'),
            Str::make('keyword'),
            DateTime::make('createdAt')
                ->sortable()
                ->readOnly(),
            DateTime::make('updatedAt')
                ->sortable()
                ->readOnly(),
        ];
    }

    public function filters(): array
    {
        return [];
    }

    public function pagination(): ?Paginator
    {
        return PagePagination::make()->withoutNestedMeta();
    }

    public function authorizable(): bool
    {
        return false;
    }
}
