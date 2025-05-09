<?php

namespace OscarTeam\Axle\Requests\Policies;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ValidatePolicy extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $policyId,
        private readonly string $accessToken,
        private readonly array $rules,
        private readonly ?string $destClientId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/policies/$this->policyId/validate";
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
        return $this->rules;
    }
}

