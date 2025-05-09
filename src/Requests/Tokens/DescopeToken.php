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

    public function __construct(
        private readonly string $accessToken,
        private readonly ?string $destClientId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/token/descope";
    }

    public function defaultHeaders(): array
    {
        return array_filter([
            'x-access-token' => $this->accessToken,
            'x-destination-client-id' => $this->destClientId
        ]);
    }

    protected function defaultBody(): array
    {
        return ['authCode' => 'monitoring'];
    }
}
