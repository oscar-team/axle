<?php

namespace OscarTeam\Axle\Requests\Tokens;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ExchangeToken extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $authCode,
        private readonly ?string $destClientId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/token/exchange";
    }

    public function defaultHeaders(): array
    {
        return array_filter([
            'x-destination-client-id' => $this->destClientId
        ]);
    }

    protected function defaultBody(): array
    {
        return ['authCode' => $this->authCode];
    }
}
