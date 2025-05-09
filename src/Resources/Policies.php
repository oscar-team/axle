<?php

namespace OscarTeam\Axle\Resources;

use OscarTeam\Axle\Requests\Policies\GetPolicy;
use OscarTeam\Axle\Requests\Policies\GetPolicyReport;
use OscarTeam\Axle\Requests\Policies\ValidatePolicy;
use Saloon\Http\Response;

class Policies extends BaseResource
{
    public function getPolicy(
        string $policyId,
        string $accessToken,
        ?string $destClientId = null,
        array $params = ['expand' => 'true']
    ): Response {
        return $this->connector->send(new GetPolicy($policyId, $accessToken, $destClientId, $params));
    }

    public function getPolicyReport(
        string $policyId,
        string $accessToken,
        ?string $destClientId = null,
        array $params = [
            'expand' => 'true',
            'mode' => 'url',
            'format' => 'pdf',
        ]
    ): Response {
        return $this->connector->send(new GetPolicyReport($policyId, $accessToken, $destClientId, $params));
    }

    public function ValidatePolicy(
        string $policyId,
        string $accessToken,
        array $rules,
        ?string $destClientId = null
    ): Response {
        return $this->connector->send(new ValidatePolicy($policyId, $accessToken, $rules, $destClientId));
    }
}
