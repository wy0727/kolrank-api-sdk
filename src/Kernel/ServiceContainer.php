<?php

namespace Kolrank\Sdk\Api\Kernel;

use Kolrank\Sdk\Api\Kernel\Providers\HttpClientServiceProvider;
use Pimple\Container;
use Kolrank\Sdk\Api\Kernel\Traits\WithAggregator;
use Kolrank\Sdk\Api\Kernel\Providers\ConfigServiceProvider;
use Kolrank\Sdk\Api\Kernel\Providers\LogServiceProvider;

class ServiceContainer extends Container
{
    use WithAggregator;
    /**
     * @var string
     */
    protected $id;
    /**
     * @var array
     */
    protected $providers = [];
    /**
     * @var array
     */
    protected $defaultConfig = [];
    /**
     * @var array
     */
    protected $userConfig = [];
    /**
     * Constructor.
     *
     * @param array       $config
     * @param array       $prepends
     * @param string|null $id
     */
    public function __construct(array $config = [], array $prepends = [],  $id = null)
    {
        $this->registerProviders($this->getProviders());
        parent::__construct($prepends);
        $this->userConfig = $config;
        $this->id = $id;
        $this->aggregate();
    }
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id ?? $this->id = md5(json_encode($this->userConfig));
    }
    /**
     * @return array
     */
    public function getConfig()
    {
        $base = [
            // http://docs.guzzlephp.org/en/stable/request-options.html
            'http' => [
                'timeout' => 30.0,
                'base_uri' => 'http://open.koldata.net/',
            ],
        ];
        return array_replace_recursive($base, $this->defaultConfig, $this->userConfig);
    }
    /**
     * Return all providers.
     *
     * @return array
     */
    public function getProviders()
    {
        return array_merge([
            ConfigServiceProvider::class,
            LogServiceProvider::class,
            HttpClientServiceProvider::class,
        ], $this->providers);
    }
    /**
     * @param string $id
     * @param mixed  $value
     */
    public function rebind($id, $value)
    {
        $this->offsetUnset($id);
        $this->offsetSet($id, $value);
    }
    /**
     * Magic get access.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }
    /**
     * Magic set access.
     *
     * @param string $id
     * @param mixed  $value
     */
    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }
    /**
     * @param array $providers
     */
    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider) {
            parent::register(new $provider());
        }
    }
}