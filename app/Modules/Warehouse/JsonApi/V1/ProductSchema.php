<?php

declare(strict_types=1);

namespace App\Modules\Warehouse\JsonApi\V1;

use App\Modules\Warehouse\Models\Product;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Number;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

final class ProductSchema extends Schema
{
    /**
     * The model the schema corresponds to.
     *
     */
    public static string $model = Product::class;

    public static function type(): string
    {
        return 'products';
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
            Number::make('price'),
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
