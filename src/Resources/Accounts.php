<?php

namespace OscarTeam\Axle\Resources;

use OscarTeam\Axle\Requests\Accounts\GetAccount;
use Saloon\Http\Response;

class Accounts extends BaseResource
{
    public function getAccount(string $accountId, string $accessToken, array $params = ['expand' => true]): Response
    {
        return $this->connector->send(new GetAccount($accountId, $accessToken, $params));
    }
}
