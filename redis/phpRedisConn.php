<?php

namespace redis;

class phpRedisConn
{
    protected $redisConn = null;

    public function __construct($ip = redisEnum::REDIS_HOST , $port = redisEnum::REDIS_PORT)
    {
        $this->redisConn = new \Redis();
        $this->redisConn->connect($ip, $port);
    }

    public function getKey($data)
    {
        $key = implode(':', $data);

        return $key;
    }

    public function set($key, $string)
    {
        $this->redisConn->set($key, $string);
    }
}