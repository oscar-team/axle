<?php

namespace OscarTeam\Axle\Resources;

use OscarTeam\Axle\Requests\Ignition\StartIgnition;
use Saloon\Http\Response;

class Ignition extends BaseResource
{
    public function startIgnition(
        array $user = [],
        ?string $redirectUri,
        ?string $webhookUri ,
        ?array $metaData,
    ): Response {
        return $this->connector->send(new StartIgnition($user, $redirectUri, $webhookUri, $metaData));
    }
}
