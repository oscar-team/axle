# Axle PHP Integration

This is a PHP library for integrating [Axle](https://docs.axle.insure/welcome) apis

## Installation

Use the package manager [composer](https://getcomposer.org/) to install.

```bash
composer require oscar-team/axle
```

## Usage

```php
require __DIR__ . '/vendor/autoload.php';

$client = new \OscarTeam\Axle\AxleClient(clientId: 'clientId', clientSecret: 'clientSecret' environment: 'test');
```

### [Ignition](https://docs.axle.insure/api-reference/ignition/start-ignition)

```php

// Get the ignition or starting url for the axle verification
$client->ignition()->startIgnition($redirectUri, $user);

```

### [Tokens](https://docs.axle.insure/api-reference/tokens/exchange-token)

```php

// Get the access token for the customer account
$client->tokens()->exchangeToken($authCode);

// Reduce scope for a specified access token. 
$client->tokens()->descopeToken($accessToken);

```

### [Accounts](https://docs.axle.insure/api-reference/accounts/account)

```php

// Get customer account
$client->accounts()->getAccount($accountId, $accessToken, $params);

```

### [Policies](https://docs.axle.insure/api-reference/policies/get-policy)

```php

// Get customer policy
$client->policies()->getPolicy($policyId, $accessToken, $params);

// Get policy report
$client->policies()->getPolicyReport($policyId, $accessToken, $params);

// Validate policies
$client->policies()->ValidatePolicy(string $policyId, string $accessToken, array $rules);

```

### Response: 
All the apis will return the Saloon response class ```use Saloon\Http\Response;```. Please refer to the [offical](https://docs.saloon.dev/the-basics/responses) documentation of saloon for more details.


## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)

