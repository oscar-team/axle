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
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/policies/$this->policyId/valid";
    }

    public function defaultHeaders(): array
    {
        return ['x-access-token' => $this->accessToken];
    }

    protected function defaultBody(): array
    {
        return $this->rules;
    }
}

