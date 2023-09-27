<?php

declare(strict_types=1);

namespace App\Modules\Word\JsonApi\V1;

use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

final class WordProviderRequest extends ResourceRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:50'
            ],
        ];
    }
}
