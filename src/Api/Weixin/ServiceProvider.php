<?php

namespace Kolrank\Sdk\Api\Api\Weixin;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        !isset($app['wechat']) && $app['wechat'] = function ($app) {
            return new Client($app);
        };
    }
}