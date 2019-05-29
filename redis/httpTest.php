<?php

namespace redis;

require __DIR__ . '/../vendor/autoload.php';

class httpTest
{
    const NUM   = 200;

    public function __construct()
    {
        $this->pRedisConn = new PredisConn();
        $this->phpRedisConn = new phpRedisConn();
    }

    public function test()
    {
        $this->testRedis($this->pRedisConn);
        $this->testRedis($this->phpRedisConn);
    }

    private function testRedis(conn $conn)
    {
        $mode = $conn->getMode();

        $startTime = Comm::getMillisecond();
        Comm::PrintEcho("string 测试开始..." . "当前时间:" . $startTime . "  测试方式:" . $mode);

        for ($i = 0; $i < self::NUM; $i++)
        {
            $conn->set($conn->getMode(), $i);
        }

        $endTime = Comm::getMillisecond();

        $useTime = $endTime - $startTime;

        $conn->incrby("useTime_" . $mode, $useTime);

        Comm::PrintEcho("string 测试结束..." . "消耗时间:" . $useTime . "  测试方式:" . $mode);
    }
}

$test = new httpTest();

$test->test();