<?php

declare(strict_types=1);

namespace App\Modules\Warehouse\JsonApi\V1;

use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

final class ProductRequest extends ResourceRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:50'
            ],
            'price' => [
                'required',
                'numeric'
            ],
        ];
    }
}
