<?php

namespace OscarTeam\Axle\Requests\Policies;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPolicyReport extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $policyId,
        private readonly string $accessToken,
        private readonly array $params,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/policies/$this->policyId/report";
    }

    public function defaultHeaders(): array
    {
        return ['x-access-token' => $this->accessToken];
    }

    protected function defaultQuery(): array
    {
        return array_filter($this->params);
    }
}

