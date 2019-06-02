<?php

namespace redis;

use Predis;

class PredisConn implements conn
{
    public $redisConn = null;

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

    public function incrby($key, $num)
    {
        $this->redisConn->incrbyfloat($key, $num);
    }

    public function getMode()
    {
        // TODO: Implement getMode() method.
        return __CLASS__;
    }
}