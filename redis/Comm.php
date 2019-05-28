<?php

namespace redis;

use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Comm
{
    /**
     * 获取当前毫秒时间
     * @access
     * @author genglintong
     * @param
     * @return float
     */
    public static function getMillisecond()
    {
        list($s1, $s2) = explode(' ', microtime());
        $curTime  = (float)sprintf('%.0f', (floatval($s1) + floatval($s2) * 1000));

        return $curTime;
    }

    public static function PrintEcho($string)
    {
        echo $string . "\n";
        self::logInfo($string);
    }

    public static function logInfo($log)
    {
        $logger = new Logger('redis');

        $logger->pushHandler(new StreamHandler(__DIR__.'/../stronge/logs/redis.log', Logger::INFO));
        $logger->pushHandler(new FirePHPHandler());

        $logger->addInfo($log);
    }
}