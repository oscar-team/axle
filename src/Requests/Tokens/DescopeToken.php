<?php

namespace OscarTeam\Axle\Requests\Tokens;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class DescopeToken extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(private readonly string $accessToken)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/token/descope";
    }

    public function headers(): array
    {
        return ['x-access-token' => $this->accessToken];
    }

    protected function defaultBody(): array
    {
        return ['authCode' => 'monitoring'];
    }
}
