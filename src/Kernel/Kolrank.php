<?php

namespace Kolrank\Sdk\Api\Kernel;

class Kolrank
{
    /**
     * @var array
     */
    protected static $config = [];

    /**
     * @param array $config
     */
    public static function mergeConfig(array $config)
    {
        static::$config = array_merge(static::$config, $config);
    }

    /**
     * @return array
     */
    public static function config()
    {
        return static::$config;
    }


}