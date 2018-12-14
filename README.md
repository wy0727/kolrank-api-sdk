# kolrank-api-sdk
kolrank api sdk，http://open.koldata.net/  http://www.kolrank.com

## Requirement

1. PHP >=7.0
2. Composer

## Installation

````shell
composer require kolrank/api
````



## Usage

### Overview

````php
<?php
use Kolrank\Sdk\Api\Factory;
//require __DIR__.'/vendor/autoload.php'; //you should require composer autoload file
// this is config
$config = [
    'app_id' => 'app_id',
    'app_secret' => 'app_secret',
    'username' => 'username',
    'password' => 'password',
    'response_type' => 'array',// return type : array collection json xml
    'log' => [//log config ,useing debug please when develop
        'default' => 'prod',
        'prod' => [
            'level' => 'info'
        ]
    ]
];

$app = Factory::kolrank($config);
$wechat = $app->wechat;
$info = $wechat->info('lengtoo');
var_dump($info);
````



### configure

````php
$config = [
    'app_id' => 'app_id', 
    'app_secret' => 'app_secret',
    'username' => 'username',
    'password' => 'password',
    'response_type' => 'array',// return type : array collection json xml
    // logs
    'log' => [
        'default' => 'dev', // default channel， 
        'channels' => [
            // test env
            'dev' => [
                'driver' => 'single',
                'path' => '/tmp/kolrank.log',
                'level' => 'debug',
            ],
            // production env
            'prod' => [
                'driver' => 'daily',
                'path' => '/tmp/kolrank.log',
                'level' => 'info',
            ],
        ],
    ],
    // http info
    'http' => [
        'max_retries' => 1,
        'retry_delay' => 500,
        'timeout' => 5.0,
        // 'base_uri' => 'http://open.koldata.net/,
    ],
]
````

### Some API



````php
<?php
use Kolrank\Sdk\Api\Factory;  
$app = Factory::kolrank($config); //__callstatic magic method, Factory::make($config);Factory::otherMehotd($config);

$wechat = $app->wechat;//get wechat client instance ,auto auth 
$info = $wechat->info('rmrbwx');

$weibo = $app->weibo;//get weibo client instance ,auto auth
$info = $weibo->info(2270576952);

$accessToken = $app->access_token;//get token instance
$tokenInfo = $accessToken->getToken();//setToken() if you want to use an exists token
````



### Cache

access_token use cache,

the cache implements  symfony/cache,

for example



````php
<?php
use Symfony\Component\Cache\Simple\RedisCache;

// 创建 redis 实例
$redis = new Redis();
$redis->connect('redis_host', 6379);

// 创建缓存实例
$cache = new RedisCache($redis);

// 替换应用中的缓存
$app->rebind('cache', $cache);
````

