<?php

namespace OscarTeam\Axle\Requests\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAccount extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $accountId,
        private readonly string $accessToken,
        private readonly array $params,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/accounts/$this->accountId";
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
