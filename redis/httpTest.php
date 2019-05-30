<?php

namespace redis;

require __DIR__ . '/../vendor/autoload.php';

class httpTest
{
    const NUM   = 1;

    public function __construct()
    {
    }

    public function test()
    {
        $t = rand(0,2);

        if ($t == 0) {
            $this->testRedis(new phpRedisConn());
        }elseif ($t == 1)
        {
            $this->testRedis(new PredisConn());
        }elseif ($t == 2)
        {
            $this->testRedis(new phpRedisPconn());
        }
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