<?php

namespace OscarTeam\Axle\Requests\Ignition;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class StartIgnition extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $redirectUri,
        private readonly array $user,
        private readonly array $metaData,
        private readonly ?string $webhookUri,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/ignition";
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'redirectUri' => $this->redirectUri,
            'user' => $this->user,
            'metadata' => $this->metaData,
            'webhookUri' => $this->webhookUri,
        ]);
    }
}
