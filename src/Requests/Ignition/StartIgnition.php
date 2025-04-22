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
        private readonly array $user,
        private readonly ?string $redirectUri,
        private readonly ?string $webhookUri,
        private readonly ?array $metaData,
    ) {
    }

    protected function defaultHeaders(): array
    {
        if (empty($this->metaData['dest_client_id'])) {
            return [];
        }

        return ['x-destination-client-id' => $this->metaData['dest_client_id']];
    }

    public function resolveEndpoint(): string
    {
        return "/ignition";
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'user' => $this->user,
            'redirectUri' => $this->redirectUri,
            'webhookUri' => $this->webhookUri,
            'metadata' => $this->metaData,
        ]);
    }
}
