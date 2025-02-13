<?php

namespace OscarTeam\Axle;

use OscarTeam\Axle\Resources\Accounts;
use OscarTeam\Axle\Resources\Ignition;
use OscarTeam\Axle\Resources\Policies;
use OscarTeam\Axle\Resources\Tokens;
use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Http\Auth\MultiAuthenticator;
use Saloon\Http\Connector;

class AxleClient extends Connector
{
    public function __construct(
        protected string $clientId,
        protected string $clientSecret,
        protected string $environment = 'prod'
    ) {
    }

    protected function defaultAuth(): MultiAuthenticator
    {
        return new MultiAuthenticator(
            new HeaderAuthenticator($this->clientId, 'x-client-id'),
            new HeaderAuthenticator($this->clientSecret, 'x-client-secret')
        );
    }

    public function resolveBaseUrl(): string
    {
        if ($this->environment === 'prod') {
            return 'https://api.axle.insure';
        }

        return 'https://sandbox.axle.insure';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    public function ignition(): Ignition
    {
        return new Ignition($this);
    }

    public function tokens(): Tokens
    {
        return new Tokens($this);
    }

    public function accounts(): Accounts
    {
        return new Accounts($this);
    }

    public function policies(): Policies
    {
        return new Policies($this);
    }
}
