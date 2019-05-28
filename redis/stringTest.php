<?php

require __DIR__ . '/../vendor/autoload.php';

$num = 500000;

$startTime = \redis\Comm::getMillisecond();

redis\Comm::PrintEcho("string 测试开始..." . "___当前时间:" . $startTime);

$phpRedis = new redis\phpRedisConn();

for ($i = 0 ; $i < $num; $i++)
{
    $phpRedis->set('phpredis', 'test');
}

$phpRedisTime = \redis\Comm::getMillisecond();
redis\Comm::PrintEcho("string phpRedis 测试结束..." . "___当前时间:" . $phpRedisTime . "___使用时间" . ($phpRedisTime - $startTime));


$Predis = new \redis\PredisConn();

for ($i = 0 ; $i < $num; $i++)
{
    $Predis->set('phpredis', 'test');
}

$PredisTime = \redis\Comm::getMillisecond();
redis\Comm::PrintEcho("string Predis 测试结束..." . "___当前时间:" . $PredisTime . "___使用时间" . ($PredisTime - $phpRedisTime));