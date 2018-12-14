<?php

namespace Kolrank\Sdk\Api;

use Kolrank\Sdk\Api\Api\Application;

class Factory
{
    public static function make($config)
    {
        return new Application($config);
    }

    public static function __callStatic($name, $arguments)
    {
        return self::make(...$arguments);
    }
}