## Predis VS phpRedis
> 项目中使用redis,对于PHP的redis连接实现,有两个包使用的较为广泛。一个是phpRedis,它是基于php的扩展,c实现。<br>另一个是pRedis,纯PHP实现。理论来讲phpRedis应该比Predis性能更好。

#### 单连接测试
`php stringTest`

```
[2019-05-28 12:38:20] redis.INFO: string phpRedis 测试结束...___当前时间:1559047100000___使用时间28999 [] []
[2019-05-28 12:38:52] redis.INFO: string Predis 测试结束...___当前时间:1559047132000___使用时间32000 [] []
```
#### redis并发测试
`ab -n 1000 -c 100 http://test.glt.com/httpTest.php`
```
# 一次请求 写两千次
127.0.0.1:6379> get useTime_redis\PredisConn
"333986"
127.0.0.1:6379> get useTime_redis\phpRedisConn
"309012"
```

`ab -n 5000 -c 100 http://test.glt.com/httpTest.php`

```
# 一次请求 写两百次
127.0.0.1:6379> get useTime_redis\phpRedisConn
"201993"
127.0.0.1:6379> get useTime_redis\PredisConn
"203008"
```

`ab -n 5000 -c 50 http://test.glt.com/httpTest.php`

```
# 一次请求 写两百次
# 大多时间消耗 在redis 等待
127.0.0.1:6379> get useTime_redis\PredisConn
"234967"
127.0.0.1:6379> get useTime_redis\phpRedisConn
"177043"
```

