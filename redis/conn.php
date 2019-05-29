<?php

namespace redis;

interface conn
{
    public function set($key, $string);
    public function incrby($key, $num);
    public function getMode();
}