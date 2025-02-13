<?php

namespace OscarTeam\Axle\Resources;

use OscarTeam\Axle\Requests\Tokens\DescopeToken;
use OscarTeam\Axle\Requests\Tokens\ExchangeToken;
use Saloon\Http\Response;

class Tokens extends BaseResource
{
    public function exchangeToken(string $autCode): Response
    {
        return $this->connector->send(new ExchangeToken($autCode));
    }

    public function descopeToken(string $accessToken): Response
    {
        return $this->connector->send(new DescopeToken($accessToken));
    }
}
