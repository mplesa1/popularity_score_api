<?php

declare(strict_types=1);

namespace App\Modules\Warehouse\JsonApi\V1;

use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

final class ProductVariantRequest extends ResourceRequest
{
    public function rules(): array
    {
        return [
            'color' => [
                'required',
                'string',
                'max:50'
            ],
            'size' => [
                'required',
                'string',
                'max:50'
            ],
            'product_id' => [
                'required',
                'integer',
                'exists:products,id'
            ],
        ];
    }
}
