<?php

namespace redis;

use Predis;

class PredisConn
{
    protected $redisConn = null;

    public function __construct($ip = redisEnum::REDIS_HOST , $port = redisEnum::REDIS_PORT)
    {
        $this->redisConn = new Predis\Client([
            'host'          => $ip,
            'port'          => $port
        ]);
    }

    public function set($key, $string)
    {
        $this->redisConn->set($key, $string);
    }
}