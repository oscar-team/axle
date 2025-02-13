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

    public function __construct(private readonly string $authCode)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/token/exchange";
    }

    protected function defaultBody(): array
    {
        return ['authCode' => $this->authCode];
    }
}
