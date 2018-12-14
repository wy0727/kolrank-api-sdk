<?php

namespace Kolrank\Sdk\Api\Api\Weibo;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        !isset($app['weibo']) && $app['weibo'] = function ($app) {
            return new Client($app);
        };
    }
}