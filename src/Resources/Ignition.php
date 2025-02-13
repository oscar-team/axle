<?php

namespace OscarTeam\Axle\Resources;

use OscarTeam\Axle\Requests\Ignition\StartIgnition;
use Saloon\Http\Response;

class Ignition extends BaseResource
{
    public function startIgnition(
        string $redirectUri,
        array $user = [],
        array $metaData = [],
        ?string $webhookUri = null,
    ): Response {
        return $this->connector->send(new StartIgnition($redirectUri, $user, $metaData, $webhookUri));
    }
}
