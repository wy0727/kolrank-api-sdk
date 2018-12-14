<?php

namespace Kolrank\Sdk\Api\Api;

use Kolrank\Sdk\Api\Kernel\ServiceContainer;


class Application extends ServiceContainer
{
    protected $providers = [
        \Kolrank\Sdk\Api\Api\Auth\ServiceProvider::class,
        \Kolrank\Sdk\Api\Api\Weibo\ServiceProvider::class,
        \Kolrank\Sdk\Api\Api\Weixin\ServiceProvider::class
    ];

}