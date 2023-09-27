<?php

declare(strict_types=1);

namespace App\Modules\Word\JsonApi\V1;

use App\Modules\Word\Models\WordProvider;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

final class WordProviderSchema extends Schema
{
    /**
     * The model the schema corresponds to.
     *
     */
    public static string $model = WordProvider::class;

    public static function type(): string
    {
        return 'wordProviders';
    }

    /**
     * Get the resource fields.
     *
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Str::make('name'),
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
