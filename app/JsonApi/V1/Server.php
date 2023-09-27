<?php

declare(strict_types=1);

namespace App\JsonApi\V1;

use App\Modules\Word\JsonApi\V1\WordProviderSchema;
use App\Modules\Word\JsonApi\V1\WordResultSchema;
use LaravelJsonApi\Core\Server\Server as BaseServer;

final class Server extends BaseServer
{
    /**
     * The base URI namespace for this server.
     */
    protected string $baseUri = '/api/v1';

    protected function allSchemas(): array
    {
        return [
            WordResultSchema::class,
            WordProviderSchema::class,
        ];
    }
}
