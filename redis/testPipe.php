<?php
require __DIR__ . '/../vendor/autoload.php';

$conn = new \redis\PredisConn();

$test = rand(0,10);
$key = "test_pipe";

if ($test) {
    $conn->redisConn->pipeline(function ($pipe) use ($key) {
        $pipe->incr($key);
        $pipe->incr($key);
        $pipe->incr($key);
        $pipe->incr($key);
        $pipe->incr($key);
        $pipe->incr($key);
        $pipe->incr($key);
        $pipe->incr($key);
        $pipe->incr($key);
        $pipe->incr($key);
    });/*
    $conn->redisConn->incr($key);
    $conn->redisConn->incr($key);
    $conn->redisConn->incr($key);
    $conn->redisConn->incr($key);
    $conn->redisConn->incr($key);
    $conn->redisConn->incr($key);
    $conn->redisConn->incr($key);
    $conn->redisConn->incr($key);
    $conn->redisConn->incr($key);
    $conn->redisConn->incr($key);*/
}else {
    $return = $conn->redisConn->pipeline(function ($pipe) use ($key) {
        $pipe->get($key);
        $pipe->get($key);
    });

    \redis\Comm::logInfo($key, $return);
}

echo $test;