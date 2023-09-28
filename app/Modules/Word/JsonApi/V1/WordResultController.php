<?php

declare(strict_types=1);

namespace App\Modules\Word\JsonApi\V1;

use App\Modules\Word\Services\WordResultServiceInterface;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\Validation\Factory as ValidatorFactory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use LaravelJsonApi\Core\Responses\DataResponse;
use LaravelJsonApi\Validation\Factory as JsonApiFactory;

final readonly class WordResultController
{
    public function __construct(
        private ValidatorFactory           $validatorFactory,
        private JsonApiFactory             $jsonApiFactory,
        private WordResultServiceInterface $wordResultService
    ) {
    }

    public function __invoke(Request $request): Responsable
    {
        $validator = $this->validatorFactory->make(
            $request->all(),
            [
                'keyword' => 'required|string|max:50',
                'wordProviderId' => 'required|integer|exists:word_providers,id',
            ]
        );

        try {
            $validator->validate();
        } catch (ValidationException) {
            return $this->jsonApiFactory->createErrors($validator);
        }
        $data = $request->all();
        $response = $this->wordResultService->search($data['keyword'], (int) $data['wordProviderId']);

        return (new DataResponse($response))->withServer('v1');
    }
}
