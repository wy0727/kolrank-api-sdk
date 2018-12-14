<?php

namespace Kolrank\Sdk\Api\Api\Auth;

use Kolrank\Sdk\Api\Kernel\AccessToken as BaseAccessToken;


class AccessToken extends BaseAccessToken
{
    /**
     * @var string
     */
    protected $endpointToGetToken = 'http://open.koldata.net/token';

    /**
     * @return array
     */
    protected function getCredentials(): array
    {
        return [
            'app_id' => $this->app['config']['app_id'],
            'app_secret' => $this->app['config']['app_secret'],
            'username' => $this->app['config']['username'],
            'password' => $this->app['config']['password'],
        ];
    }
}
