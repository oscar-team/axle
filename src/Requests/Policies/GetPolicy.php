<?php

namespace OscarTeam\Axle\Requests\Policies;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPolicy extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $policyId,
        private readonly string $accessToken,
        private readonly array $params = ['expand' => true],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/policies/$this->policyId";
    }

    public function headers(): array
    {
        return ['x-access-token' => $this->accessToken];
    }

    protected function defaultQuery(): array
    {
        return array_filter($this->params);
    }
}

