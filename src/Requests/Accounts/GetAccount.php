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
        private readonly ?string $destClientId,
        private readonly array $params,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/accounts/$this->accountId";
    }

    public function defaultHeaders(): array
    {
        return array_filter([
            'x-access-token' => $this->accessToken,
            'x-destination-client-id' => $this->destClientId
        ]);
    }

    protected function defaultQuery(): array
    {
        return array_filter($this->params);
    }
}
