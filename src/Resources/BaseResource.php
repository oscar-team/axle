<?php

namespace OscarTeam\Axle\Resources;

use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;

class BaseResource
{
    public function __construct(protected Connector $connector)
    {
    }

    public function call(Request $request): Response
    {
        return $this->connector->send($request);
    }
}
